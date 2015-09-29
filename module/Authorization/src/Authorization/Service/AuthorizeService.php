<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 25.09.15
 * Time: 1:02
 */
namespace Authorization\Service;

use Authorization\Entity\Provider;
use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthorizeService implements ServiceLocatorAwareInterface
{
    /** @var  Provider $providerEntity */
    protected $providerEntity;

    protected $_em;

    protected $serviceLocator;

    public function __construct($providerEntity)
    {
        $this->providerEntity = $providerEntity;
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    public function setServiceLocator(
        ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function getEntityManager()
    {
        if($this->_em == null){
            $this->_em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->_em;
    }

    public function setEntityManager(EntityManager $entityManager)
    {
        $this->_em = $entityManager;
    }
    public function save($data)
    {
        $entityManager = $this->getEntityManager();
        /** @var DoctrineHydrator $hydrator */
        $hydrator = new DoctrineHydrator($entityManager, 'Authorization\Entity\Provider');

        $provider = $hydrator->hydrate($data, new Provider());

        $entityManager->persist($provider);
        $entityManager->flush();

        return $provider;
    }
}