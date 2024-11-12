<?php

namespace App\Classes;

class Evento {
  private $idEvento;
  private $idAnfitriao;
  private $nome;
  private $descricao;
  private $local;
  private $bairro;
  private $rua;
  private $data;
  private $categoria;
  private $imagem;

  const colunas = ['idEvento', 'idAnfitriao', 'Nome', 'Descricao', 'DataEvento', 'LocalEvento', 'Bairro', 'Rua', 'Categoria', 'Imagem'];

  public function __construct($idEvento, $idAnfitriao, $nome, $descricao, $data, $local, $rua, $bairro, $categoria, $imagem) {
    $this->setIdEvento($idEvento);
    $this->setIdAnfitriao($idAnfitriao);
    $this->setNome($nome);
    $this->setDescricao($descricao);
    $this->setData($data);
    $this->setLocal($local);
    $this->setBairro($bairro);
    $this->setRua($rua);
    $this->setCategoria($categoria);
    $this->setImagem($imagem);
  }

  public function getIdEvento() {
    return $this->idEvento;
  }
  public function setIdEvento($idEvento) {
    $this->idEvento = $idEvento;
  }

  public function getIdAnfitriao() {
    return $this->idAnfitriao;
  }
  public function setIdAnfitriao($idAnfitriao) {
    $this->idAnfitriao = $idAnfitriao;
  }

  public function getNome() {
    return $this->nome;
  }
  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getImagem() {
    return $this->imagem;
  }
  public function setImagem($imagem) {
    $this->imagem = $imagem;
  }

  public function getDescricao() {
    return $this->descricao;
  }
  public function setDescricao($descricao) {
    $this->descricao = $descricao;
  }

  public function getLocal() {
    return $this->local;
  }
  public function setLocal($local) {
    $this->local = $local;
  }

  public function getBairro() {
    return $this->bairro;
  }
  public function setBairro($bairro) {
    $this->bairro = $bairro;
  }

  public function getRua() {
    return $this->rua;
  }
  public function setRua($rua) {
    $this->rua = $rua;
  }

  public function getData() {
    return $this->data;
  }
  public function setData($data) {
    $this->data = $data;
  }

  public function getCategoria() {
    return $this->categoria;
  }
  public function setCategoria($categoria) {
    $this->categoria = $categoria;
  }
}

?>