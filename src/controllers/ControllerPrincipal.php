<?php

namespace App\Controllers;

use App\Classes\Usuario;
use App\Classes\Anfitriao;

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

      if($resposta == 0){
        return false;
      } else if($linha['Senha'] !== $request['Senha']){
        die(var_dump($linha));
        return false;
      }

      $pessoa = $request['tipo'] == 'usuarios' ? new Usuario(
        $linha['idUsuario'],
        $linha['Nome'],
        $linha['DataNascimento'],
        $linha['Cpf'],
        $linha['Genero'],
        $linha['Telefone'],
        $linha['Email'],
        $linha['Senha'],
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
}

?>