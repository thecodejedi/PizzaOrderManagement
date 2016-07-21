<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Product;
use AppBundle\Entity\ProductGroup;
use AppBundle\Form\ProductType;
use AppBundle\Form\ProductGroupType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/product")
 * @Security("has_role('ROLE_ADMIN')")
 */
class ProductController extends Controller {

    /**
     * @Route("/", name="products")
     * @Template
     */
    public function productsAction(Request $request) {
        $products = $this->getDoctrine()
                ->getRepository('AppBundle:Product')
                ->findActive();

        $groups = $this->getDoctrine()
                ->getRepository('AppBundle:ProductGroup')
                ->findAll();

        return array('products' => $products, 'groups' => $groups);
    }

    /**
     * @Route("/create", 
     * name="createProduct")
     * @Template("AppBundle:Product:product.html.twig")
     */
    public function createProductAction(Request $request) {

        $product = new Product();
        $product->setActive(true);
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->get('cancel')->isClicked()) {
            return $this->redirectToRoute('products');
        }

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('products');
        }

        return array(
            'form' => $form->createView());
    }

    /**
     * @Route("/{productId}", 
     * requirements = { "productId" = "[0-9]+" },
     * name="editProduct")
     * @Template("AppBundle:Product:product.html.twig")
     */
    public function editProductAction(Request $request, $productId) {

        $product = $this->getDoctrine()
                ->getRepository('AppBundle:Product')
                ->find($productId);

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->get('cancel')->isClicked()) {
            return $this->redirectToRoute('products');
        }

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('products');
        }

        return array(
            'form' => $form->createView());
    }

    /**
     * @Route("/{productId}/delete", 
     * requirements = { "productId" = "[0-9]+" },
     * name="deleteProduct")
     */
    public function deleteProductAction(Request $request, $productId) {


        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AppBundle:Product')->find($productId);

        if (isset($product)) {
            $product->setActive(false);
            $em->persist($product);
            $em->flush();
        }
        return new Response(
                'Content', Response::HTTP_OK, array('content-type' => 'text/html'));
    }

    /**
     * @Route("/groups/create", 
     * name="createProductGroup")
     * @Template("AppBundle:Product:productGroup.html.twig")
     */
    public function createProductGroupsAction(Request $request) {

        $productGroup = new ProductGroup();
        $form = $this->createForm(ProductGroupType::class, $productGroup);
        $form->handleRequest($request);

        if ($form->get('cancel')->isClicked()) {
            return $this->redirectToRoute('products');
        }

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productGroup);
            $em->flush();
            return $this->redirectToRoute('products');
        }

        return array(
            'form' => $form->createView());
    }

    /**
     * @Route("/groups/{productGroupId}", 
     * requirements = { "productGroupId" = "[0-9]+" },
     * name="editProductGroup")
     * @Template("AppBundle:Product:productGroup.html.twig")
     */
    public function editProductGroupAction(Request $request, $productGroupId) {

        $productGroup = $this->getDoctrine()
                ->getRepository('AppBundle:Product')
                ->find($productGroupId);

        $form = $this->createForm(ProductGroupType::class, $productGroup);
        $form->handleRequest($request);

        if ($form->get('cancel')->isClicked()) {
            return $this->redirectToRoute('products');
        }

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productGroup);
            $em->flush();
            return $this->redirectToRoute('products');
        }

        return array(
            'form' => $form->createView());
    }

    /**
     * @Route("/groups/{productGroupId}/delete", 
     * requirements = { "productId" = "[0-9]+" },
     * name="deleteProductGroup")
     */
    public function deleteProductGroupsAction(Request $request, $productGroupId) {


        $em = $this->getDoctrine()->getManager();
        $productGroup = $em->getRepository('AppBundle:ProductGroup')->find($productGroupId);

        if (isset($productGroup)) {
            $em->remove($productGroup);
            $em->flush();
        }
        return new Response(
                'Content', Response::HTTP_OK, array('content-type' => 'text/html'));
    }

}
