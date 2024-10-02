<?php
namespace App\Controllers;

use App\Controller;
use App\Providers\SQLService;
use App\Providers\HTTPService;
use App\Classes\Evento;
use Exception;

session_start();

class EventoController extends Controller {
  public function criarEvento(){
    if(empty($_SESSION['anfitrioes']->getIdAnfitriao())){
      $this->redirecionar('/anfitrioes/login');
    }

    try{
      $sqlService = new SQLService();
      $httpService = new HTTPService();

      $sqlService->conectar();
      $request = $httpService->fetchRequest();

      if($request['id']){
        return $this->atualizarEvento($request);
      }

      /* die($_SESSION['anfitrioes']->getIdAnfitriao()); */

      $evento = new Evento(
        null,
        $_SESSION['anfitrioes']->getIdAnfitriao(),
        $request['Nome'],
        $request['Descricao'],
        $request['Data'],
        $request['Local'],
        $request['Bairro'],
        $request['Rua'],
        $request['Categoria'],
        ""
      );

      $operacao = 'create';
      $tabela = 'Evento';
      $colunas = Evento::colunas;
      $valores = [
        $evento->getIdEvento(),
        $evento->getIdAnfitriao(),
        $evento->getNome(),
        $evento->getDescricao(),
        $evento->getData(),
        $evento->getLocal(),
        $evento->getBairro(),
        $evento->getRua(),
        $evento->getCategoria(),
        $evento->getImagem()
      ];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      if(!$resposta){
        die("Deu errado: $resposta");
      }
      $sqlService->desconectar();

      $this->redirecionar('/');    
    } catch(Exception $erro){
      echo $erro->getMessage();
    }
  }

  public function buscarEventos(){
    try{
      $sqlService = new SQLService();
      $httpService = new HTTPService();

      $sqlService->conectar();
      $request = $httpService->fetchGet();

      if($request['id']){
        return $this->buscarEventoPorId($request['id']);
      }

      $eventos = [];
      $contador = 0;

      $operacao = 'find';
      $tabela = 'Evento';

      $resposta = $sqlService->executar($operacao, $tabela);
      while($linha = mysqli_fetch_assoc($resposta)){
        $evento = new Evento(
          $linha['idEvento'],
          $linha['idAnfitriao'],
          $linha['Nome'],
          $linha['Descricao'],
          $linha['DataEvento'],
          $linha['LocalEvento'],
          $linha['Bairro'],
          $linha['Rua'],
          $linha['Categoria'],
          $linha['Imagem']
        );

        $eventos[$contador] = $evento;
        $contador++;
      }

      if(empty($eventos)){
        return false;
      }
      $sqlService->desconectar();

      $this->renderizar('index', ['eventos' => $eventos]);
    } catch(Exception $erro){
      echo $erro->getMessage();
    }
  }

  public function buscarEventoPorId($id){
    try{
      $sqlService = new SQLService();
      $httpService = new HTTPService();

      $sqlService->conectar();
      $request = $httpService->fetchGet();

      $operacao = 'findOne';
      $tabela = 'Evento';
      $colunas = ['idEvento'];
      $valores = [$id];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      $linha = mysqli_fetch_assoc($resposta);
      $evento = new Evento(
        $linha['idEvento'],
        $linha['idAnfitriao'],
        $linha['Nome'],
        $linha['Descricao'],
        $linha['DataEvento'],
        $linha['LocalEvento'],
        $linha['Bairro'],
        $linha['Rua'],
        $linha['Categoria'],
        $linha['Imagem']
      );

      if(!$resposta){
        die("Deu errado: $resposta");
      }
      $sqlService->desconectar();

      $this->renderizar('evento', ['evento' => $evento]);
    } catch(Exception $erro){
      echo $erro->getMessage();
    }
  }

  public function atualizarEvento($evento){
    try{
      $sqlService = new SQLService();
      $httpService = new HTTPService();

      $sqlService->conectar();

      $operacao = 'update';
      $tabela = 'Evento';
      $colunas = Evento::colunas;
      $valores = [
        $evento['id'],
        $evento['idAnfitriao'],
        $evento['Nome'],
        $evento['Descricao'],
        $evento['Data'],
        $evento['Local'],
        $evento['Bairro'],
        $evento['Rua'],
        $evento['Categoria'],
        ""
      ];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      if(!$resposta){
        die("Deu errado: $resposta");
      }
      $sqlService->desconectar();

      $this->redirecionar('/');      
    } catch(Exception $erro){
      echo $erro->getMessage();
    }
  }

  public function deletarEvento(){
    try{
      $sqlService = new SQLService();
      $httpService = new HTTPService();

      $sqlService->conectar();
      $request = $httpService->fetchGet();

      $operacao = 'delete';
      $tabela = 'Evento';
      $colunas = Evento::colunas;
      $valores = [$request['id']];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      if(!$resposta){
        die("Deu errado: $resposta");
      }
      $sqlService->desconectar();

      $this->redirecionar('/');      
    } catch(Exception $erro){
      echo $erro->getMessage();
    }
  }
}