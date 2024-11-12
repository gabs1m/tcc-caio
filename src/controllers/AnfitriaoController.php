<?php
namespace App\Controllers;

use App\Controller;
use App\Providers\SQLService;
use App\Providers\HTTPService;
use App\Classes\Anfitriao;
use Exception;

session_start();

class AnfitriaoController extends Controller {
  public function criarAnfitriao() {
    try{
      $sqlService = new SQLService();
      $httpService = new HTTPService();

      $sqlService->conectar();
      $request = $httpService->fetchRequest();

      if($request['id']){
        return $this->atualizarAnfitriao($request);
      }

      $anfitriao = new Anfitriao(
        null,
        $request["Nome"],
        $request["DocumentoIdentidade"],
        $request["Telefone"],
        $request["Email"],
        $request["Senha"],
        ""
      );

      $operacao = 'create';
      $tabela = 'Anfitriao';
      $colunas = Anfitriao::colunas;
      $valores = [
        $anfitriao->getIdAnfitriao(),
        $anfitriao->getNome(),
        $anfitriao->getDocumentoIdentidade(),
        $anfitriao->getTelefone(),
        $anfitriao->getEmail(),
        $anfitriao->getSenha(),
        $anfitriao->getImagem()
      ];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      if(!$resposta){
          die("Deu errado: $resposta");
      }
      $sqlService->desconectar();

      $this->redirecionar('/anfitrioes/login');
    } catch(Exception $erro){
      echo $erro->getMessage();
    }
  }

  public function buscarAnfitrioes(){
      try{
        $sqlService = new SQLService();
        $sqlService->conectar();

        $httpService = new HTTPService();
        $request = $httpService->fetchGet();

        if($request['id']){
          return $this->buscarAnfitriaoPorId($request['id']);
        }

        $anfitrioes = [];
        $contador = 0;

        $operacao = 'find';
        $tabela = 'Anfitriao';

        $resposta = $sqlService->executar($operacao, $tabela);
        while($linha = mysqli_fetch_assoc($resposta)){
        $anfitrioes[$contador] = $linha;
        $contador++;
        }

        $sqlService->desconectar();

        if(empty($anfitrioes)){
            return false;
        }

        $this->renderizar('anfitrioes', ['anfitrioes' => $anfitrioes]);
      } catch(Exception $erro){
        echo $erro->getMessage();
      }
  }

  public function buscarAnfitriaoPorId($idAnfitriao){
    try{
      $sqlService = new SQLService();
      $sqlService->conectar();

      $operacao = 'findOne';
      $tabela = 'Anfitriao';
      $colunas = ['idAnfitriao'];
      $valores = [$idAnfitriao];

      $resposta = $sqlService->executar($operacao, $tabela, $colunas, $valores);
      $anfitriao = mysqli_fetch_assoc($resposta);
      
      $sqlService->desconectar();

      if(!$anfitriao){
          return false;
      }

      $this->renderizar('anfitrioes', ['anfitrioes' => $anfitriao]);
    } catch(Exception $erro){
      echo $erro->getMessage();
    }
  }

  public function atualizarAnfitriao($anfitriao){
    try{
      $sqlService = new SQLService();
      $sqlService->conectar();

      $operacao = 'update';
      $tabela = 'Anfitriao';
      $colunas = Anfitriao::colunas;
      $valores = [
        $idAnfitriao = $anfitriao->getIdAnfitriao(),
        $nome = $anfitriao->getNome(),
        $documentoIdentidade = $anfitriao->getDocumentoIdentidade(),
        $telefone = $anfitriao->getTelefone(),
        $email = $anfitriao->getEmail(),
        $senha = $anfitriao->getSenha(),
        $imagem = $anfitriao->getImagem()
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

  public function deletarAnfitriao(){
    try{
      $sqlService = new SQLService();
      $sqlService->conectar();

      $httpService = new HTTPService();
      $request = $httpService->fetchGet();

      $operacao = 'delete';
      $tabela = 'Anfitriao';
      $colunas = Anfitriao::colunas;
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