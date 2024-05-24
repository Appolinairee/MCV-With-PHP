<?php

abstract class Controller {

    public function __construct() {}

    public function loadModel(string $model) {
        $modelClass = ucfirst($model);
        $modelFilePath = ROOT . 'models/' . $modelClass . '.php';

        if (file_exists($modelFilePath)) {
            require_once($modelFilePath);
            $this->$model = new $modelClass();
        } else {
            throw new Exception("Le fichier du modèle n'existe pas : " . $modelFilePath);
        }
    }


    public function render(string $fichier, array $data = []){
        extract($data);

        ob_start();

        require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');

        $content = ob_get_clean();

        require_once(ROOT.'views/layouts/default.php');
    }
}