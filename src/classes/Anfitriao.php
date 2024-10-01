<?php

namespace App\Classes;

use App\Classes\Pessoa;

class Anfitriao extends Pessoa {
  private $idAnfitriao;
  private $documentoIdentidade;

  const colunas = ['idAnfitriao', 'Nome', 'DocumentoIdentidade', 'Telefone', 'Email', 'Senha', 'Imagem'];

  public function __construct($idAnfitriao, $nome, $documentoIdentidade, $telefone, $email, $senha, $imagem) {
    $this->setIdAnfitriao($idAnfitriao);
    $this->setNome($nome);
    $this->setDocumentoIdentidade($documentoIdentidade);
    $this->setTelefone($telefone);
    $this->setEmail($email);
    $this->setSenha($senha);
    $this->setImagem($imagem);
  }

  public function getIdAnfitriao() {
    return $this->idAnfitriao;
  }
  public function setIdAnfitriao($idAnfitriao) {
    $this->idAnfitriao = $idAnfitriao;
  }

  public function getDocumentoIdentidade() {
    return $this->documentoIdentidade;
  }
  public function setDocumentoIdentidade($documentoIdentidade) {
    $this->documentoIdentidade = $documentoIdentidade;
  }
}

?>