<?php

namespace Servise\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use ZfcBase\Form\ProvidesEventsForm;


class Search extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->add([
            'type' => 'text',
            'name' => 'errand_search',
            'options' => [
            ],
        ]);

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'search_city',
            'attributes' => [
                'options' => [
                    'Select City' => 'Select City',
                ],
                'class' => 'form-control',
            ],
        ));

        $submitElement = new Element\Button('submit');
        $submitElement
            ->setLabel('Submit')
            ->setAttributes(array(
                'type'  => 'submit',

            ));
    }
}