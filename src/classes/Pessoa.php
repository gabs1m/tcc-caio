<?php

namespace App\Classes;

class Pessoa {
  private $nome;
  private $telefone;
  private $email;
  private $senha;
  private $imagem;

  public function getNome() {
    return $this->nome;
  }
  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getTelefone() {
    return $this->telefone;
  }
  public function setTelefone($telefone) {
    $this->telefone = $telefone;
  }

  public function getEmail() {
    return $this->email;
  }
  public function setEmail($email) {
    $this->email = $email;
  }

  public function getSenha() {
    return $this->senha;
  }
  public function setSenha($senha) {
    $this->senha = $senha;
  }

  public function getImagem() {
    return $this->imagem;
  }
  public function setImagem($imagem) {
    $this->imagem = $imagem;
  }
}

?>