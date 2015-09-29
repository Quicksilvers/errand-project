<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 13.09.15
 * Time: 17:10
 */

namespace Authorization\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Authorization\Form\RegisterForm;
use Authorization\Service\AuthorizeService;

class AuthorizeController extends AbstractActionController
{
    /** @var RegisterForm $registerForm */
    protected $registerForm;

    /** @var AuthorizeService $authorizeService */
    protected $authorizeService;

    public function __construct($registerForm, AuthorizeService $authorizeService)
    {
        $this->registerForm     = $registerForm;
        $this->authorizeService = $authorizeService;
    }

    public function registerAction()
    {
        $request = $this->getRequest();

        if($request->isPost()) {
            $this->registerForm->setData($request->getPost());

            if($this->registerForm->isValid()) {
                try {
                    $this->authorizeService->save($this->registerForm
                        ->getData()['register-form-fieldset']);

                    return $this->redirect()->toRoute('application');
                } catch(\Exception $e) {
                    throw new \Exception;
                }
            }
        }

        return new ViewModel([
            'form' => $this->registerForm
        ]);
    }
}