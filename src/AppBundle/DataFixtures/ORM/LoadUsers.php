<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of LoadSlotData
 *
 * @author oberfreak
 */
class LoadUsers extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        $adminGroup = $this->getReference('admin-role');


        $admin = new User();
        $admin->setUsername("admin");
        $admin->addRole($adminGroup);
        $admin->setPassword($this->createPassword("admin", $admin));
        $admin->setIsActive(true);
        $manager->persist($admin);

        $manager->flush();
    }

    private function createPassword($plainPassword, $user) {

        $encoder = $this->container->get('security.password_encoder');
        return $encoder->encodePassword($user, $plainPassword);
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }

}
