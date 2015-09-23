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
            'name' => 'username',
            'options' => array(
                'label' => 'Username',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

        $this->add([
            'name' => "phone",
            'options' => [
                'label' => 'Mobile number'
            ],
            'attributes' => [
                'type' => 'text'
            ]
        ]);

        $this->add(array(
            'name' => 'email',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

        $this->add(array(
            'name' => 'display_name',
            'options' => array(
                'label' => 'Display Name',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

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
            'name' => 'credit_card',
            'options' => array(
                'label' => 'Credit card number',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

        $this->add(array(
            'name' => 'cvv',
            'options' => array(
                'label' => 'CVV',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

        $this->add(array(
            'name' => 'expiration_date',
            'options' => array(
                'label' => 'Expiration date',
            ),
            'attributes' => array(
                'type' => 'date'
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'language',
            'attributes' => [
                'options' => [
                    'En' => 'En',
                    'Fr' => 'Fr'
                ]
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
                'type' => 'text'
            ),
        ));

        $submitElement = new Element\Button('submit');
        $submitElement
            ->setLabel('Submit')
            ->setAttributes(array(
                'type'  => 'submit',
            ));

        $this->add($submitElement, array(
            'priority' => -100,
        ));

        $this->add(array(
            'name' => 'userId',
            'type' => 'Zend\Form\Element\Hidden',
            'attributes' => array(
                'type' => 'hidden'
            ),
        ));

        // @TODO: Fix this... getValidator() is a protected method.
        //$csrf = new Element\Csrf('csrf');
        //$csrf->getValidator()->setTimeout($this->getRegistrationOptions()->getUserFormTimeout());
        //$this->add($csrf);
    }
}
