<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Role;

/**
 * Description of LoadSlotData
 *
 * @author oberfreak
 */
class LoadRoles extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        $adminRole = new Role();
        $adminRole->setName("ROLE_ADMIN");
        $manager->persist($adminRole);
        
        
        $manager->flush();

        $this->addReference('admin-role', $adminRole);
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }

}
