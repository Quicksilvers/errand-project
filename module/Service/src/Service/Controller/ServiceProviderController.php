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

class ServiceProviderController extends AbstractRestfulController
{
    public function get()
    {
        echo 1;
    }
}