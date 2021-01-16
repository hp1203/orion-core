<?php 

namespace app\core\middlewares;
/**
 * Class BaseMiddleware
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package app\core\middlewares
 */
abstract class BaseMiddleware 
{   
    abstract public function execute();
}