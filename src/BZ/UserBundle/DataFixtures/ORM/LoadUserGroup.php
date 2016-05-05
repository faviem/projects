<?php
/*
 * This file is part of the Gestion Internet Game Center package.
 *
 * (c) Blue Zone <contact@bluezone.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace BZ\UserBundle\DataFixtures\ORM;

/**
 * Load default users
 *
 * @author Jacques Adjahoungbo <tocicason@hotmail.fr>
 */

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BZ\UserBundle\Entity\Group;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadUserGroup extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
//        $adminsGroup = new Group('administration');
//        $adminsGroup->addRole('ROLE_ADMIN');
//        $manager->persist($adminsGroup);
//        $manager->flush();
//        $this->addReference('admin‐group', $adminsGroup);
    }
    /**
    * {@inheritdoc}
    */
    public function getOrder()
    {
        return 1;
    }
}