<?php 

namespace app\core\form;

use app\core\Model;
use app\core\form\BaseField;

/**
 * Class InputField
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package app\core\form
 */

 class InputField extends BaseField
 {
    public const TYPE_TEXT = 'text';
    public const TYPE_EMAIL = 'email';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';

    public string $type;
    public Model $model;
    public string $attribute;
    public string $label;
    public string $placeholder;

    /**
     * InputField Constructor
     * 
     * @param \app\core\Model $model
     * @param string $attribute
     */

    public function __construct(Model $model, string $attribute, string $label, string $placeholder)
    {
        $this->type = self::TYPE_TEXT;
        $this->placeholder = $placeholder;
        parent::__construct($model, $attribute, $label);
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function emailField()
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

    public function renderInput(): string
    {
        return sprintf('
            <input type="%s" id="inputLastName" value="%s" placeholder="%s" autofocus="" name="%s" class="form-control %s">
        ',
        $this->type,
        $this->model->{$this->attribute}, 
        $this->placeholder, 
        $this->attribute,
        $this->model->hasError($this->attribute) ? 'is-invalid' : '');
    }
 }
