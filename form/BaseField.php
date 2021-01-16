<?php 

namespace app\core\form;

use app\core\Model;

/**
 * Class BaseField
 * 
 * @author Himanshu Purohit <himanshu1203@gmail.com>
 * @package app\core\form
 */

 abstract class BaseField
 {

    public Model $model;
    public string $attribute;
    public string $label;

    /**
     * BaseField Constructor
     * 
     * @param \app\core\Model $model
     * @param string $attribute
     */

    public function __construct(Model $model, string $attribute, string $label)
    {
        $this->label = $label;
        $this->model = $model;
        $this->attribute = $attribute;
    }
    abstract public function renderInput(): string;

    public function __toString()
    {
        return sprintf('
            <label for="inputLastName" class="visually-hidden">%s</label>
            %s
            <div class="invalid-feedback">
                %s
            </div>
        ', $this->label, 
        $this->renderInput(),
        $this->model->getFirstError($this->attribute));
    }
 }