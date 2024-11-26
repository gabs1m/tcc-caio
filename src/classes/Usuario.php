<?php

namespace App\Classes;

use App\Classes\Pessoa;

class Usuario extends Pessoa {
  private $idUsuario;
  private $cpf;
  private $dataNascimento;
  private $genero;

  const colunas = ['Nome', 'DataNascimento', 'Cpf', 'Genero', 'Telefone', 'Email', 'Senha', 'idUsuario', 'Imagem'];

  public function __construct($nome, $dataNascimento, $cpf, $genero, $telefone, $email, $senha, $idUsuario = null, $imagem = null){ 
    $this->setIdUsuario($idUsuario);
    $this->setNome($nome);
    $this->setDataNascimento($dataNascimento);
    $this->setCpf($cpf);
    $this->setGenero($genero);
    $this->setTelefone($telefone);
    $this->setEmail($email);
    $this->setSenha($senha);
    $this->setImagem($imagem);
  }

  public function getIdUsuario() {
    return $this->idUsuario;
  }
  public function setIdUsuario($idUsuario) {
    $this->idUsuario = $idUsuario;
  }

  public function getCpf() {
    return $this->cpf;
  }
  public function setCpf($cpf) {
    $this->cpf = $cpf;
  }

  public function getDataNascimento() {
    return $this->dataNascimento;
  }
  public function setDataNascimento($dataNascimento) {
    $this->dataNascimento = $dataNascimento;
  }

  public function getGenero() {
    return $this->genero;
  }
  public function setGenero($genero) {
    $this->genero = $genero;
  }
}

?>