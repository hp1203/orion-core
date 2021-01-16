<?php 

namespace himanshupurohit\orion\form;

use himanshupurohit\orion\Model;
use himanshupurohit\orion\form\InputField;
use himanshupurohit\orion\form\TextareaField;

/**
 * Class Form
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package himanshupurohit\orion\form
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
