<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 24.09.15
 * Time: 23:36
 */
namespace Authorization\Form;

use Zend\Form\Element\Checkbox;
use Zend\Form\Fieldset;

class RegisterFormFieldset extends Fieldset
{
    public function __construct()
    {
        parent::__construct();
        $this->add([
            'type' => 'text',
            'name' => 'fullName',
            'options' => [
                'label' => 'Full name'
            ],
        ]);
        $this->add([
            'type' => 'text',
            'name' => 'phone',
            'options' => [
                'label' => 'Phone number'
            ]
        ]);
        $this->add([
            'type' => 'text',
            'name' => 'email',
            'options' => [
                'label' => 'Email'
            ]
        ]);

        $this->add(array(
            'name' => 'password',
            'type' => 'password',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => array(
                'type' => 'password'
            ),
        ));

        $this->add(array(
            'name' => 'passwordVerify',
            'type' => 'password',
            'options' => array(
                'label' => 'Password Verify',
            ),
            'attributes' => array(
                'type' => 'password'
            ),
        ));

        $this->add(array(
            'name' => 'vehicle',
            'type' =>  'Zend\Form\Element\Checkbox',
            'options' => array(
                'label' => 'You have a vehicle',
            ),
            'attributes' => array(
                'type' => 'checkbox'
            ),
        ));

        $this->add(array(
            'name' => 'avaialbility',
            'type' => 'Zend\Form\Element\Checkbox',
            'options' => array(
                'label' => 'Availalble',
            ),
            'attributes' => array(
                'type' => 'checkbox'
            ),
        ));
    }
}