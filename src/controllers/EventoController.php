<?php
namespace App\Controllers;

use App\Controller;
use App\Providers\SQLService;
use App\Providers\HTTPService;
use App\Classes\Evento;
use Exception;

class EventoController extends Controller {
  public function criarEvento(){
    try{
      $sqlService = new SQLService();
      $httpService = new HTTPService();

      $sqlService->conectar();
      $request = $httpService->fetchRequest();

      if($request['id']){
        return $this->atualizarEvento($request);
      }

      $evento = new Evento(
        null,
        $request['idAnfitriao'],
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

      $operacao = 'read';
      $tabela = 'Evento';

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      while($linha = mysqli_fetch_assoc($resposta)){
        $eventos[$contador] = $linha;
        $contador++;
      }

      if(empty($eventos)){
        return false;
      }
      $sqlService->desconectar();

      $this->renderizar('eventos', ['eventos' => $eventos]);
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

      if(!$resposta){
        die("Deu errado: $resposta");
      }
      $sqlService->desconectar();

      $this->renderizar('evento', ['evento' => $eventos]);
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