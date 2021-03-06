<?php

namespace ZfcUser\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use ZfcBase\Form\ProvidesEventsForm;

class Base extends ProvidesEventsForm
{
    public function __construct()
    {
        parent::__construct();

        $this->add(array(
            'name' => 'need',
            'type' =>  'Zend\Form\Element\Checkbox',
            'options' => array(
                'label' => 'You have a need',
            ),
            'attributes' => array(
                'type' => 'checkbox',
                'class' => 'help',
            ),
        ));

        $this->add(array(
            'name' => 'want',
            'type' =>  'Zend\Form\Element\Checkbox',
            'options' => array(
                'label' => 'You have a want',
            ),
            'attributes' => array(
                'type' => 'checkbox',
                'class' => 'help',
            ),
        ));

        $this->add(array(
            'name' => 'read',
            'type' =>  'Zend\Form\Element\Checkbox',
            'options' => array(
                'label' => 'You have a want',
            ),
            'attributes' => array(
                'type' => 'checkbox',
                'class' => 'read'
            ),
        ));


        $this->add(array(
            'name' => 'username',
            'options' => array(
                'label' => 'Username',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'name',
                'placeholder' => 'Full Name e.g:00 000 000',
            ),
        ));

        $this->add([
            'name' => "phone",
            'options' => [
                'label' => 'Mobile number'
            ],
            'attributes' => [
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'phone',
                'placeholder' => 'Mobile Number e.g:00 000 000',
            ]
        ]);

        $this->add(array(
            'name' => 'email',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'email',
                'placeholder' => 'Email ID',
            ),
        ));

        $this->add(array(
            'name' => 'display_name',
            'options' => array(
                'label' => 'Display Name',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'type' => 'password',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => array(
                'type' => 'password',
                'class' => 'form-control',
                'id' => 'password',
                'placeholder' => 'Password',
            ),
        ));

        $this->add(array(
            'name' => 'passwordVerify',
            'type' => 'password',
            'options' => array(
                'label' => 'Password Verify',
            ),
            'attributes' => array(
                'type' => 'password',
                'class' => 'form-control',
                'id' => 'confirm_password',
                'placeholder' => 'Confirm Password',
            ),
        ));

        $this->add(array(
            'name' => 'cvv',
            'options' => array(
                'label' => 'CVV',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'cvc',
                'placeholder' => 'CVV',
            ),
        ));

        $this->add(array(
            'name' => 'credit_card',
            'options' => array(
                'label' => 'Credit card number',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'card-number',
                'placeholder' => 'Credit Card',
            ),
        ));


        $this->add(array(
            'name' => 'expiration_date',
            'options' => array(
                'label' => 'Expiration date',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'date',
                'placeholder' => 'Expiration Date e.g: mm/yyyy',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'language',
            'attributes' => [
                'options' => [
                    'Select Language' => 'Select Language',
                    'En' => 'En',
                    'Fr' => 'Fr'
                ],
                'class' => 'form-control',
                'id' => 'language',

            ],
            'options' => array(
                'label' => 'Which is your mother tongue?',

            )
        ));

        $this->add(array(
            'name' => 'postalCode',
            'options' => array(
                'label' => 'Postal Code',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'postal_code',
                'placeholder' => 'Postal Code e.g: 000 000',
            ),
        ));

        $submitElement = new Element\Button('submit');
        $submitElement
            ->setLabel('Submit')
            ->setAttributes(array(
                'type'  => 'submit',
                'class' => 'btn_one',

            ));

        $this->add($submitElement, array(
            'priority' => -100,
        ));

        $this->add(array(
            'name' => 'userId',
            'type' => 'Zend\Form\Element\Hidden',
            'attributes' => array(
                'type' => 'hidden',

            ),
        ));

        // @TODO: Fix this... getValidator() is a protected method.
        //$csrf = new Element\Csrf('csrf');
        //$csrf->getValidator()->setTimeout($this->getRegistrationOptions()->getUserFormTimeout());
        //$this->add($csrf);
    }
}
