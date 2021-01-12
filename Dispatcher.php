<?php

namespace mvc;

use mvc\Request;
use mvc\Router;


class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();

        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = ucfirst($this->request->controller);
        $controlName = $name . "Controller";
        $file = 'mvc\\Controllers\\' . $controlName;
        $controller = new $file();

        return $controller;
    }

}
?>