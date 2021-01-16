<?php 

namespace app\core;

use app\core\Application;
/**
 * Class Router
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package app\core
 */
class Router 
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * Router Constructor.
     * 
     * @param app\core\Request $request
     * * @param app\core\Response $response
     */

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            $this->response->setStatusCode(404);
            return Application::$app->view->renderView("_404");
            exit;
        }
        if(is_string($callback)){
            return Application::$app->view->renderView($callback);
        }
        if(is_array($callback)){
            Application::$app->controller = new $callback[0]();
            Application::$app->controller->action = $callback[1];
            
            foreach(Application::$app->controller->getMiddlewares() as $middleware){
                $middleware->execute();
            }
            $callback[0] = Application::$app->controller;
        }
        return  call_user_func($callback, $this->request, $this->response);
    }


    
}