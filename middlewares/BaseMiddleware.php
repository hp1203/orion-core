<?php 

namespace himanshupurohit\orion\middlewares;
/**
 * Class BaseMiddleware
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package himanshupurohit\orion\middlewares
 */
abstract class BaseMiddleware 
{   
    abstract public function execute();
}