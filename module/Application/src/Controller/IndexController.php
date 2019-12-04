<?php

namespace Application\Controller;

use Application\Helpers\FlightApi;
use Application\Helpers\FlightApiHelper;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
