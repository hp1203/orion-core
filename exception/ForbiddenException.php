<?php 

namespace himanshupurohit\orion\exception;
use Exception;
/**
 * Class ForbiddenException
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package himanshupurohit\orion\exception
 */
class ForbiddenException extends \Exception
{
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
}