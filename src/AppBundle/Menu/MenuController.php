<?php

namespace AppBundle\Menu;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Knp\Menu\FactoryInterface;

class MenuController Implements ContainerAwareInterface {

    use \Symfony\Component\DependencyInjection\ContainerAwareTrait;
    public function createMainMenu(FactoryInterface $factory, array $arguments) {

        $authChecker = $this->container->get('security.authorization_checker');
        $isAdmin = $authChecker->isGranted('ROLE_ADMIN');

        $isAuthenticated = $authChecker->isGranted('IS_AUTHENTICATED_FULLY');
        
    
        $menu = $factory->createItem('root');
        if (isset($arguments['rootClass'])) {
            $menu->setChildrenAttribute('class', $arguments['rootClass']);
        }

        $menu->addChild('Home', array('route' => 'index'));
        $menu->addChild('Orders', array('route' => 'orders'));
        
        if ($isAuthenticated) {
            $menu->addChild('Products', array('route' => 'products'));
            $menu->addChild('Logout', array('route' => 'logout_route'));
        }else{
            $menu->addChild('Login', array('route' => 'login_route'));
        }



        return $menu;
    }

}
