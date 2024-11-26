<?php

namespace App\Controllers;

use App\Classes\Usuario;
use App\Classes\Anfitriao;
use App\Classes\Evento;

use App\Providers\SQLService;
use App\Providers\HTTPService;

use App\Controller;

use Exception;

session_start();

class ControllerPrincipal extends Controller {
  public function login(){
    try{
      $sqlService = new SQLService();
      $sqlService->conectar();

      $httpService = new HTTPService();
      $request = $httpService->fetchRequest();
      
      $operacao = 'findOne';
      $tabela = $request['tipo'] == 'usuarios' ? 'usuario' : 'anfitriao';
      $colunas = ['Email'];
      $valores = [$request["Email"]];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      $linha = mysqli_fetch_assoc($resposta);
      $sqlService->desconectar();

      if(!$resposta){
        $this->redirecionar;
      } else if($linha['Senha'] !== $request['Senha']){
        die(var_dump($linha));
        return false;
      }

      $pessoa = $request['tipo'] == 'usuarios' ? new Usuario(
        $linha['Nome'],
        $linha['DataNascimento'],
        $linha['Cpf'],
        $linha['Genero'],
        $linha['Telefone'],
        $linha['Email'],
        $linha['Senha'],
        $linha['idUsuario'],
        $linha['Imagem']
      ) : new Anfitriao(
        $linha['idAnfitriao'],
        $linha['Nome'],
        $linha['DocumentoIdentidade'],
        $linha['Telefone'],
        $linha['Email'],
        $linha['Senha'],
        $linha['Imagem']
      );

      $httpService->setSession([
        'tipo' => $request['tipo'],
        $request['tipo'] => $pessoa
      ]);

      $this->redirecionar('/');
    } catch(Exception $erro){
      echo $erro->getMessage();
    }
  }

  public function logout(){
    session_unset();
    $this->redirecionar('/');
  }

  public function adicionarFavorito(){
    try{
      $sqlService = new SQLService();
      $sqlService->conectar();
      
      $httpService = new HTTPService();
      $request = $httpService->fetchGet();
      $session = $httpService->fetchSession();

      if(isset($session['favoritos'])){
        $favoritos = $session['favoritos'];
      } else {
        $favoritos = [];
      }

      $operacao = 'findOne';
      $tabela = 'evento';
      $colunas = ['idEvento'];
      $valores = [$request['id']];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      $linha = mysqli_fetch_assoc($resposta);

      $evento = new Evento(
        $linha['idEvento'],
        $linha['idAnfitriao'],
        $linha['Nome'],
        $linha['Descricao'],
        $linha['DataEvento'],
        $linha['LocalEvento'],
        $linha['Rua'],
        $linha['Bairro'],
        $linha['Categoria'],
        $linha['Imagem']
      );

      if(!in_array($evento, $favoritos)){
        array_push($favoritos, $evento);
      }

      $httpService->setSession([
        'favoritos' => $favoritos
      ]);

      $this->redirecionar('/favoritos');
    } catch(Exception $erro){
      echo $erro->getMessage();
    }
  }

  public function limparFavoritos(){
    $httpService = new HTTPService();
    $httpService->setSession([
      'favoritos' => []
    ]);

    $this->redirecionar('/');
  }
}

?>