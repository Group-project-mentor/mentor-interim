<?php

class App
{
    protected $controller = 'landing';  
    protected $method = 'index'; 
    protected $params = [];
    public function __construct()
    {
        $url = $this->parseUrl();

        if (empty($url)) {
            $this->defaultLoader($url);
        }
        else $this->loader($url);
    }
    private function defaultLoader($url)
    {
        require '../app/controllers/landing.php';
        $this->controller = new $this->controller;
        $this->controller->index();
    }


    private function loader($url)
    {
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        // var_dump($url);

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
                // $this->controller->$this->method();
            }
        }
        
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
