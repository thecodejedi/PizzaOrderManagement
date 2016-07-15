<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\TotalOrder;
use AppBundle\Form\TotalOrderType;

class DefaultController extends Controller {

    /**
     * @Route("/", name="index")
     * @Template
     */
    public function indexAction(Request $request) {
        $todaysOrder = $this->getDoctrine()
                ->getRepository('AppBundle:TotalOrder')
                ->findTodaysOrder();

        if ($todaysOrder != null) {
            return $this->redirectToRoute('displayTotalOrder', array('totalId' => $todaysOrder->getId()));
        }

        return null;
    }


}
