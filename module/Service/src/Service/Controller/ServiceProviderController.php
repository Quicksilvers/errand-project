<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 08.10.15
 * Time: 0:15
 */

namespace Service\Controller;

use Service\Service\ServiceService;
use ZfrRest\Mvc\Controller\AbstractRestfulController;
use ZfrRest\View\Model\ResourceViewModel;

class ServiceProviderController extends AbstractRestfulController
{
    /** @var ServiceService $serviceService */
    protected $serviceService;

    public function __construct(ServiceService $service)
    {
        $this->serviceService = $service;
    }

    public function get(array $params)
    {
        if(!empty($params['service_id'])) {

        }

        $services = $this->serviceService->findAll();
        return new ResourceViewModel(
            ['services' => $services], ['template' => 'service/services']
        );
    }
}