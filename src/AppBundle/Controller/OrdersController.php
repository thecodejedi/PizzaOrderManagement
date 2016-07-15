<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\TotalOrder;
use AppBundle\Entity\SingleOrder;
use AppBundle\Form\SingleOrderType;
use AppBundle\Form\TotalOrderType;

/**
 * @Route("/orders")
 */
class OrdersController extends Controller {

    /**
     * @Route("/", name="history")
     * @Template
     */
    public function historyAction(Request $request) {
        $allOrders = $this->getDoctrine()
                ->getRepository('AppBundle:TotalOrder')
                ->findOrders();

        return array('allOrders' => $allOrders);
    }

    /**
     * @Route("/{totalId}", 
     * requirements = { "totalId" = "[0-9]+" },
     * name="displayTotalOrder")
     * @Template
     */
    public function displayTotalOrderAction(Request $request, $totalId) {

        $totalOrder = $this->getDoctrine()
                ->getRepository('AppBundle:TotalOrder')
                ->find($totalId);

        return array('totalOrder' => $totalOrder);
    }

    /**
     * @Route("/{totalId}/createSingle", 
     * requirements = { "totalId" = "[0-9]+" },
     * name="createSingle")
     * @Template
     */
    public function createSingleAction(Request $request, $totalId) {

        $totalOrder = $this->getDoctrine()
                ->getRepository('AppBundle:TotalOrder')
                ->find($totalId);

        $singleOrder = new \AppBundle\Entity\SingleOrder();
        $singleOrder->setOrder($totalOrder);

        $form = $this->createForm(SingleOrderType::class, $singleOrder);
        $form->handleRequest($request);

        if ($form->get('cancel')->isClicked()) {
            return $this->redirectToRoute('index');
        }

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($singleOrder);
            $em->flush();
            return $this->redirectToRoute('index');
        }

        return array(
            'form' => $form->createView());
    }

    /**
     * @Route("/createTotal", name="createTotalOrder")
     * @Template
     */
    public function createTotalAction(Request $request) {

        $totalOrder = new TotalOrder();
        $totalOrder->setActive(true);
        $totalOrder->setDate(new \DateTime());
        $form = $this->createForm(TotalOrderType::class, $totalOrder);
        $form->handleRequest($request);

        if ($form->get('cancel')->isClicked()) {
            return $this->redirectToRoute('index');
        }

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($totalOrder);
            $em->flush();
            return $this->redirectToRoute('index');
        }

        return array(
            'form' => $form->createView());
    }

}
