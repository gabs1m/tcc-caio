<?php
namespace App;

use Exception;

class Roteador {
    protected $rotas = [];

    public function adicionarRota($metodo, $rota, $controller, $acao) {
        $this->rotas[$metodo][$rota] = [
            'controller' => $controller,
            'acao' => $acao
        ];
    }

    public function get($rota, $controller, $acao) {
        $this->adicionarRota('GET', $rota, $controller, $acao);
    }
    public function post($rota, $controller, $acao) {
        $this->adicionarRota('POST', $rota, $controller, $acao);
    }
    
    public function despachar() {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $metodo = $_SERVER['REQUEST_METHOD'];

        try {
            if(array_key_exists($uri, $this->rotas[$metodo])) {
                $controller = $this->rotas[$metodo][$uri]['controller'];
                $acao = $this->rotas[$metodo][$uri]['acao'];

                if(class_exists($controller)) {
                    $controller = new $controller();
                    if(method_exists($controller, $acao)) {
                        $controller->$acao();
                    }
                }
            } else{
                echo "Erro: Rota não encontrada - $uri";
            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}