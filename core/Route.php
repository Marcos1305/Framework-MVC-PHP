<?php

namespace Core;

class Route
{
    private $routes;

    public function __construct(array $routes)
    {
        $this->setRoutes($routes);
        $this->run();
    }

    private function setRoutes($routes)
    {
        foreach($routes as $route){
            $explode = explode('@', $route[1]);
            $r = [$route[0], $explode[0], $explode[1]];
            $newRoutes[] = $r;
        }
        $this->routes = $newRoutes;
    }

    private function getRequest()
    {
        $obj=new \stdClass;
        
        $get=(object)$_GET;
        $post=(object)$_POST;

        $obj->get=$get;
        $obj->post=$post;
        
        return $obj;   
    }

    private function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    private function run(){
        $url =  $this->getUrl();
        $urlArray = explode('/', $url);

        foreach ($this->routes as $route){
            $routeArray = explode('/', $route[0]);
            $param = [];
            $found = [];
            for($i = 0; $i < count($routeArray); $i++){
                if((strpos($routeArray[$i], "{") !==false) && (count($urlArray) == count($routeArray))){
                    $routeArray[$i] = $urlArray[$i];
                    $param[] = $urlArray[$i];
                }
                $route[0] = implode($routeArray, '/');
            }
            if($url == $route[0]){
                $found = true;
                $controller = $route[1];
                $action = $route[2];
                break;
            }
            
        }
        if($found){
            $controller = Container::newController($controller);
            //$controller->$action();
            switch (count($param)){
                case 1:
                $controller->$action($param[0], $this->getRequest());
                break;
                
                case 2:
                $controlelr->$action($param[0], $param[1], $this->getRequest());
                break;
                
                case 3:
                $controlelr->$action($param[0], $param[1], $param[2], $this->getRequest());
                break;

                default:
                    $controller->$action($this->getRequest());

            }
            
        }else{
           Container::pageNotFound();
        }

    }

    
}


?>