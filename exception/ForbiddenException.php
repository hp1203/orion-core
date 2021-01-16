<?php 

namespace app\core\exception;
use Exception;
/**
 * Class ForbiddenException
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package app\core\exception
 */
class ForbiddenException extends \Exception
{
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
}