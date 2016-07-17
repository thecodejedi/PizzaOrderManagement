<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\TotalOrder;
use AppBundle\Entity\SingleOrder;
use AppBundle\Form\SingleOrderType;
use AppBundle\Form\TotalOrderType;
use Symfony\Component\Form\FormError;

/**
 * @Route("/orders")
 */
class OrdersController extends Controller {

    /**
     * @Route("/", name="orders")
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
     * @Template("AppBundle:Orders:single.html.twig")
     */
    public function createSingleAction(Request $request, $totalId) {

        $totalOrder = $this->getDoctrine()
                ->getRepository('AppBundle:TotalOrder')
                ->find($totalId);

        $singleOrder = new \AppBundle\Entity\SingleOrder();
        $singleOrder->setOrder($totalOrder);

        $form = $this->createForm(SingleOrderType::class, $singleOrder);
        $form->handleRequest($request);

        if (!$totalOrder->getActive()) {
            $form->addError(new FormError('The Order has already been closed. Changes are no longer possible'));
        }

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
     * @Route("/single/{singleId}", 
     * requirements = { "singleId" = "[0-9]+" },
     * name="editSingle")
     * @Template("AppBundle:Orders:single.html.twig")
     */
    public function editSingleAction(Request $request, $singleId) {

        $singleOrder = $this->getDoctrine()
                ->getRepository('AppBundle:SingleOrder')
                ->find($singleId);

        $form = $this->createForm(SingleOrderType::class, $singleOrder);
        $form->handleRequest($request);

        if (!$singleOrder->getOrder()->getActive()) {
            $form->addError(new FormError('The Order has already been closed. Changes are no longer possible'));
        }

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
     * @Route("/single/{singleId}/delete", 
     * requirements = { "singleId" = "[0-9]+" },
     * name="deleteSingle")
     */
    public function deleteSingleAction(Request $request, $singleId) {


        $em = $this->getDoctrine()->getManager();
        $singleOrder = $em->getRepository('AppBundle:SingleOrder')->find($singleId);
        if (isset($singleOrder)) {

            if ($singleOrder->getOrder()->getActive()) {
                $em->remove($singleOrder);
                $em->flush();
            }
        }
        return new Response(
                'Content', Response::HTTP_OK, array('content-type' => 'text/html'));
    }

    /**
     * @Route("/createTotal", name="createTotalOrder")
     * @Security("has_role('ROLE_ADMIN')")
     * @Template("AppBundle:Orders:total.html.twig")
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

    /**
     * @Route("/{totalId}/edit", 
     *          name="editTotal",
     *          requirements = { "totalId" = "[0-9]+" })
     * @Security("has_role('ROLE_ADMIN')")
     * @Template("AppBundle:Orders:total.html.twig")
     */
    public function editTotalAction(Request $request, $totalId) {

        $totalOrder = $this->getDoctrine()
                ->getRepository('AppBundle:TotalOrder')
                ->find($totalId);

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
