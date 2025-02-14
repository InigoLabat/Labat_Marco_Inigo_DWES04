<?php

class Router {

    private $rutas;
    private $params;

    public function add($ruta, $parametros) {
        $this->rutas[$ruta] = $parametros;
    }

    public function match($url) {
        foreach ($this->rutas as $route=>$parametros){
            $pattern = str_replace(['{id}', '/'], ['([0-9]+)', '\/'], $route);
            $pattern = '/^' . $pattern . '$/'; // aniadimos las contrabarras para la url

            if(preg_match($pattern, $url)){
                $this->params = $parametros;
                return true;
            }
        }
        return false;
    }

    public function getParams(){
        return $this->params;
    }
}