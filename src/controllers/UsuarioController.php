<?php
namespace App\Controllers;

use App\Controller;
use App\Providers\SQLService;
use App\Providers\HTTPService;
use App\Classes\Usuario;
use Exception;

class UsuarioController extends Controller {
  public function criarUsuario() {
    try{
      $sqlService = new SQLService();
      $httpService = new HTTPService();

      $sqlService->conectar();
      $request = $httpService->fetchRequest();
      
      if($request['id']){
        return $this->atualizarUsuario($request);
      }
      
      $usuario = new Usuario(
        null,
        $request["Nome"],
        $request["DataNascimento"],
        $request["Cpf"],
        $request["Genero"],
        $request["Telefone"],
        $request["Email"],
        $request["Senha"],
        ""
      );

      $operacao = 'create';
      $tabela = 'Usuario';
      $colunas = Usuario::colunas;
      $valores = [
        $usuario->getIdUsuario(),
        $usuario->getNome(),
        $usuario->getDataNascimento(),
        $usuario->getCpf(),
        $usuario->getGenero(),
        $usuario->getTelefone(),
        $usuario->getEmail(),
        $usuario->getSenha(),
        $usuario->getImagem()
      ];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      if(!$resposta){
        die("Deu errado: $resposta");
      }
      $sqlService->desconectar();

      $this->redirecionar('/usuarios/login');
    } catch(Exception $erro){
      echo $erro->getMessage();
    }
  }

  public function buscarUsuarios(){
      try{
        $sqlService = new SQLService();
        $sqlService->conectar();

        $httpService = new HTTPService();
        $request = $httpService->fetchGet();

        if($request['id']){
          return $this->buscarUsuarioPorId($request['id']);
        }

        $usuarios = [];
        $contador = 0;

        $operacao = 'find';
        $tabela = 'Usuario';

        $resposta = $sqlService->executar($operacao, $tabela);
        while($linha = mysqli_fetch_assoc($resposta)){
          $usuarios[$contador] = $linha;
          $contador++;
        }

        $sqlService->desconectar();

        if(empty($usuarios)){
          return false;
        }

        $this->renderizar('usuarios', ['usuarios' => $usuarios]);
      } catch(Exception $erro){
        echo $erro->getMessage();
      }
  }

  public function buscarUsuarioPorId($idUsuario){
    try{
      $sqlService = new SQLService();
      $sqlService->conectar();

      $operacao = 'findOne';
      $tabela = 'Usuario';
      $colunas = ['idUsuario'];
      $valores = [$idUsuario];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      $usuario = mysqli_fetch_assoc($resposta);
      
      $sqlService->desconectar();

      if(!$usuario){
          return false;
      }

      $this->renderizar('usuarios', ['usuarios' => $usuario]);
    } catch(Exception $erro){
      echo $erro->getMessage();
    }
  }

  public function atualizarUsuario($usuario){
    try{
      $sqlService = new SQLService();
      $sqlService->conectar();

      $operacao = 'update';
      $tabela = 'Usuario';
      $colunas = Usuario::colunas;
      $valores = [
        $usuario['id'],
        $usuario['Nome'],
        $usuario['DataNascimento'],
        $usuario['Cpf'],
        $usuario['Genero'],
        $usuario['Telefone'],
        $usuario['Email'],
        $usuario['Senha'],
        ''
      ];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      $sqlService->desconectar();

      if(!$resposta){
          return false;
      }

      $this->redirecionar('/');
    } catch(Exception $erro){
        echo $erro->getMessage();
    }
  }

  public function deletarUsuario(){
    try{
      $sqlService = new SQLService();
      $sqlService->conectar();

      $httpService = new HTTPService();
      $request = $httpService->fetchGet();

      $operacao = 'delete';
      $tabela = 'Usuario';
      $colunas = Usuario::colunas;
      $valores = [$request['id']];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      $sqlService->desconectar();

      if(!$resposta){
        return false;
      }

      $this->redirecionar('/');
    } catch(Exception $erro){
      echo $erro->getMessage();
    }
  }
}

?>