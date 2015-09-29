<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 24.09.15
 * Time: 23:33
 */
namespace Authorization\Form;

use Zend\Form\Form;
use Authorization\Form\RegisterFormFieldset;
class RegisterForm extends Form
{
    public function init()
    {
        /**
         * Define a form fieldset template
         */
        $this->add([
            'name' => 'register-form-fieldset',
            'type' => RegisterFormFieldset::class
        ]);

        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Register new service provider'
            ]
        ]);
    }
}