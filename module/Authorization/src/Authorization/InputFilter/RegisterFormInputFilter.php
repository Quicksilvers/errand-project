<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 29.09.15
 * Time: 19:15
 */
namespace Authorization\InputFilter;

use Zend\Filter\Boolean;
use Zend\Filter\StringTrim;
use Zend\InputFilter\InputFilter;
use Zend\Validator\EmailAddress;
use Zend\Validator\StringLength;

/**
 * Validation for a register provider form
 *
 * Class RegisterFormInputFilter
 * @package Authorization\InputFilter
 */
class RegisterFormInputFilter extends InputFilter
{
    public function init()
    {
        $this->add([
            'name'       => 'fullName',
            'required'   => true,
            'validators' => [
                [
                    'name'    => StringLength::class,
                    'options' => ['max' => 50],
                ]
            ],
            'filters'   => [
                new StringTrim,
            ]
        ]);

        $this->add([
            'name'     => 'phone',
            'required' => false,
            'filters' => [
                new StringTrim
            ]
        ]);

        $this->add([
            'name' => 'email',
            'required' => true,
            'validators' => [
                new EmailAddress
            ]
        ]);

        $this->add([
            'name' => 'password',
            'required' => true,
            'validators' => [
                [
                    'name'    => StringLength::class,
                    'options' => ['min' => 3,'max' => 50],
                ]
            ],
            'filters'     => [
                new StringTrim
            ]
        ]);


        $this->add([
            'name' => 'passwordVerify',
            'required' => true,
            'validators' => [
                [
                    'name'    => StringLength::class,
                    'options' => ['min' => 3,'max' => 50],
                ]
            ],
            'filters'     => [
                new StringTrim
            ],
            [
                'name' => 'Identical',
                'options' => [
                    'token' => 'password'
                ]
            ]
        ]);

        $this->add([
            'name' => 'vehicle',
            'required' => true,
            'filters' => [
                new Boolean
            ]
        ]);

        $this->add([
            'name' => 'availability',
            'required' => true,
            'filters' => [
                new Boolean
            ]
        ]);
    }
}