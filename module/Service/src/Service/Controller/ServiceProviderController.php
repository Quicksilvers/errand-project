<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 08.10.15
 * Time: 0:15
 */

namespace Service\Controller;

use ZfrRest\Mvc\Controller\AbstractRestfulController;
use ZfrRest\View\Model\ResourceViewModel;
use Service\Entity\Location;

class ServiceProviderController extends AbstractRestfulController
{
    /**
     * @var
     */
    protected $search_form;

    /**
     * @return mixed
     */

    public function get()
    {
        echo 1;
    }

    public function providerId()
    {
        if (!$this->search_form) {
            $form = $this->getServiceLocator()->get('SearchForm');
        }
        $location = new Location();

        echo '<pre>';
        print_r($location->getName());
        echo '</pre>';exit;

    }
}