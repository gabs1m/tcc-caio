<?php

namespace App;

class Controller {
    protected function renderizar($view, $dados = []) {
        extract($dados);
        require "views/$view.php";
    }

    protected function redirecionar($rota) {
        header("Location: $rota");
    }
}

?>