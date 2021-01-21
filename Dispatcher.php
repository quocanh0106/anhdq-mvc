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

        /*tách url thành các mảng riêng biệt*/
        Router::parse($this->request->url, $this->request);

        /*khởi tạo controller*/
        $controller = $this->loadController();
        /* run action của controller */
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        /*viết url chữ thường thì nó chuyển thành đúng chuẩn lập trình*/
        $name = ucfirst($this->request->controller);
        $controlName = $name . "Controller";
        /*  */
        $file = 'mvc\\Controllers\\' . $controlName;
        $controller = new $file();

        return $controller;
    }

}
?>