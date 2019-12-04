<?php

namespace Ajax\Controller;

use Ajax\Helpers\FlightApi;
use Application\Helpers\FlightApiHelper;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AjaxController extends AbstractActionController
{
    public function ajaxAction()
    {
        $params = $this->params()->fromQuery();
        $function = $params['action'] ?? 'error';

        $helper = new FlightApiHelper();
        switch ($function) {
            case 'from':
                $response = $helper->getDestinationsAvailableFrom($params);
                break;
            case 'to':
                $response = $helper->getDestinationsAvailableTo($params);
                break;
            default:
                $response = 'Error';
        }

        echo json_encode($response);
//        if ($this->getRequest()->isXmlHttpRequest()) {
//        } else {
//            $view =  new ViewModel();
//            $view->setVariable('response', $response);
//
//            return $view;
//        }

        return "FIN";
    }
}
