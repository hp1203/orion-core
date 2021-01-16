<?php 

namespace app\core\form;

use app\core\Model;
use app\core\form\InputField;
use app\core\form\TextareaField;

/**
 * Class Form
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package app\core\form
 */

 class Form 
 {
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        return '</form>';
    }

    public function inputField(Model $model, $attribute, $label = "", $placeholder = "")
    {
        return new InputField($model, $attribute, $label, $placeholder);
    }

    public function textareaField(Model $model, $attribute, $label = "", $placeholder = "")
    {
        return new TextareaField($model, $attribute, $label, $placeholder);
    }
 }
