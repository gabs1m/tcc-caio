<?php

use App\Controllers\ControllerPrincipal;
use App\Controllers\UsuarioController;
use App\Controllers\AnfitriaoController;
use App\Controllers\EventoController;
use App\Controllers\ViewController;
use App\Roteador;

$roteador = new Roteador();

$roteador->get('/', ViewController::class, 'index');
$roteador->get('/logout', ControllerPrincipal::class, 'logout');

$roteador->get('/usuarios', UsuarioController::class, 'buscarUsuarios');
$roteador->get('/usuarios/login', ViewController::class, 'formLogin');
$roteador->post('/usuarios/login', ControllerPrincipal::class, 'login');
$roteador->get('/usuarios/cadastro', ViewController::class, 'formCadastro');
$roteador->post('/usuarios/cadastro', UsuarioController::class, 'criarUsuario');
$roteador->get('/usuarios/deletar', UsuarioController::class, 'deletarUsuario');

$roteador->get('/anfitrioes', AnfitriaoController::class, 'buscarAnfitrioes');
$roteador->get('/anfitrioes/login', ViewController::class, 'formLogin');
$roteador->post('/anfitrioes/login', ControllerPrincipal::class, 'login');
$roteador->get('/anfitrioes/cadastro', ViewController::class, 'formCadastro');
$roteador->post('/anfitrioes/cadastro', AnfitriaoController::class, 'criarAnfitriao');
$roteador->get('/anfitrioes/deletar', AnfitriaoController::class, 'deletarAnfitriao');

$roteador->get('/eventos', EventoController::class, 'buscarEventos');
$roteador->get('/eventos/cadastro', ViewController::class, 'formCadastro');
$roteador->post('/eventos/cadastro', EventoController::class, 'criarEvento');
$roteador->get('/eventos/deletar', EventoController::class, 'deletarEvento');

$roteador->despachar();

?>
