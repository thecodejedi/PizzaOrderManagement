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
use AppBundle\Form\ConfirmPayedType;
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
     * @Route("/{totalId}/byProduct", 
     * requirements = { "totalId" = "[0-9]+" },
     * name="totalByProduct")
     * @Template
     */
    public function totalByProductAction(Request $request, $totalId) {

        $totalOrder = $this->getDoctrine()
                ->getRepository('AppBundle:TotalOrder')
                ->find($totalId);

        $orders = $totalOrder->getOrders();
        $products = array();
        foreach ($orders as $order) {
            $product = $order->getProduct();
            $key = $product->getId();
            if (strlen($order->getText()) > 0) {
                $key .= strtolower($order->getText());
            }

            if (isset($products[$key])) {
                $productArr = $products[$key];
                $comments = $productArr['comments'];
                $productArr['count'] = $productArr['count'] + 1;
            } else {
                $productArr = array();
                $productArr["product"] = $product;
                $productArr['count'] = 1;
                $comments = array();
                if (strlen($order->getText()) > 0) {
                    array_push($comments, $order->getText());
                }
            }
            $productArr["comments"] = $comments;
            $products[$key] = $productArr;
        }


        return array('totalOrder' => $totalOrder, 'products' => $products);
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
        $singleOrder->setPayed(false);

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
            return $this->redirectToRoute('confirmPayed', array('singleId' => $singleOrder->getId()));
        }

        return array(
            'form' => $form->createView());
    }

    /**
     * @Route("/single/{singleId}/confirmPayed", 
     * requirements = { "totalId" = "[0-9]+" },
     * name="confirmPayed")
     * @Template("AppBundle:Orders:confirmPayed.html.twig")
     */
    public function confirmPayedAction(Request $request, $singleId) {
        $singleOrder = $this->getDoctrine()
                ->getRepository('AppBundle:SingleOrder')
                ->find($singleId);

        $formData = array('code' => '', 'singleOrder' => $singleOrder);

        $form = $this->createForm(ConfirmPayedType::class, $formData);
        $form->handleRequest($request);

        if (!$singleOrder->getOrder()->getActive()) {
            $form->addError(new FormError('The Order has already been closed. Changes are no longer possible'));
        }

        if ($form->get('cancel')->isClicked()) {
            return $this->redirectToRoute('index');
        }

        if ($form->isValid()) {
            $expectedCode = $singleOrder->getOrder()->getCode();
            $enteredCode = $form->get('code')->getData();
            $logger = $this->get('logger');
            $logger->info('Expected: ' . $expectedCode);
            $logger->info('Entered: ' . $enteredCode);
            if (strcasecmp($expectedCode, $enteredCode) != 0) {
                $form->get('code')->addError(new FormError('The code you entered is not correct.'));
                return array(
                    'form' => $form->createView(), 'singleOrder' => $singleOrder);
            }
            $singleOrder->setPayed(true);
            $em = $this->getDoctrine()->getManager();
            $em->persist($singleOrder);
            $em->flush();
            return $this->redirectToRoute('index');
        }

        return array(
            'form' => $form->createView(), 'singleOrder' => $singleOrder);
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
            return $this->redirectToRoute('confirmPayed', array('singleId' => $singleOrder->getId()));
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

    private function createCode() {
        $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numeric = '0123456789';
        return substr(str_shuffle($alpha), 0, 1) . substr(str_shuffle($numeric), 0, 1);
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
        $totalOrder->setCode($this->createCode());
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
