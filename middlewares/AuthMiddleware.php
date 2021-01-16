<?php 

namespace app\core\middlewares;

use app\core\Application;
use app\core\middlewares\BaseMiddleware;
use app\core\exception\ForbiddenException;
/**
 * Class AuthMiddleware
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package app\core\middlewares
 */
class AuthMiddleware extends BaseMiddleware
{
    public array $actions;
    /**
     * @param array $actions
     */

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if(Application::isGuest()){
            if(empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)){
                throw new ForbiddenException();
            }
        }
    }

}