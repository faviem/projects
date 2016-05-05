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
use BZ\UserBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
class LoadUser extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    
    public function load(ObjectManager $manager)
    {
//        $user1 = new User();
//        $user1->setUsername('admin');        
//        $user1->setEnabled(true);
//        $user1->setEmail('jacques-i-class@gmail.com');
//        $user1->setPlainPassword('adminpass');
//        $user1->setRoles(array('ROLE_SUPER_ADMIN'));
//        
//        $user1->addGroup($this->getReference('admin‐group'));
//        $user1->addRole('ROLE_ADMIN'); 
//        
//        // On le persiste
//        $manager->persist($user1);
//        $manager->flush();
    }
    /**
    * {@inheritdoc}
    */
    public function getOrder()
    {
    return 2;
    } 
    
}