<?php
namespace App\Core;

class BaseController {
    // Méthode pour rendre une vue
    protected function render($viewName, $data = []) {
        extract($data);
        include "./views/{$viewName}.phtml";
    }

    // Méthode pour rediriger vers un autre endpoint
    protected function redirect($path) {
        header("Location: $path");
        exit();
    }

}
