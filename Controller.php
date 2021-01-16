<?php 

namespace himanshupurohit\orion;
use himanshupurohit\orion\Application;
use himanshupurohit\orion\middlewares\BaseMiddleware;
/**
 * Class Controller
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package himanshupurohit\orion
 */

 class Controller
 {
     public string $layout = 'main';
     public string $action = '';
     /**
      * @var himanshupurohit\orion\middlewares\BaseMiddleware[]
      */
     protected array $middlewares = [];

     public function setLayout($layout)
     {
         $this->layout = $layout;
     }
    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
       $this->middlewares[] = $middleware;
    }

     /**
      * Get the value of middlewares
      *
      * @return  himanshupurohit\orion\middlewares\BaseMiddleware[]
      */ 
     public function getMiddlewares()
     {
          return $this->middlewares;
     }
 }