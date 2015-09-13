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

class AuthorizeController extends AbstractActionController
{
    public function indexAction()
    {
        $objectManager = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');

        $user = new \Authorization\Entity\User();
        $user->setFullName('Marco Pivetta');

        $objectManager->persist($user);
        $objectManager->flush();

        die(var_dump($user->getId()));
    }
}