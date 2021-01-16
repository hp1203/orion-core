<?php 

namespace app\core\form;

use app\core\Model;
use app\core\form\BaseField;

/**
 * Class TextareaField
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package app\core\form
 */

 class TextareaField extends BaseField
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
     * TextareaField Constructor
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
            <textarea type="%s" id="inputLastName" placeholder="%s" autofocus="" name="%s" class="form-control %s">%s</textarea>
        ',
        $this->type,
        $this->placeholder, 
        $this->attribute,
        $this->model->hasError($this->attribute) ? 'is-invalid' : '',
        $this->model->{$this->attribute});
    }
 }
