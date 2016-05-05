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

namespace BZ\ModelBundle\DataFixtures\ORM;

/**
 */

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BZ\ModelBundle\Entity\Profil;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
class LoadProfil extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    
    public function load(ObjectManager $manager)
    {
        
            $profil = new Profil;
            $profil->setCode("ROLE_DDIP");
            $profil->setLibelle("Directeur de la DIP");
            $manager->persist($profil);
            
            $profil1 = new Profil;
            $profil1->setCode("ROLE_CSRU");
            $profil1->setLibelle("Chef Service SRU");
            $manager->persist($profil1);
            
            $profil2 = new Profil;
            $profil2->setCode("ROLE_CSRU");
            $profil2->setLibelle("Chef Service SRU");
            $manager->persist($profil2);
            
            $profil3= new Profil;
            $profil3->setCode("ROLE_RT");
            $profil3->setLibelle("Responsable Technique");
            $manager->persist($profil3);
            
            $profil4= new Profil;
            $profil4->setCode("ROLE_CSI");
            $profil4->setLibelle("Chef Service SI");
            $manager->persist($profil4);
            
            $profil5= new Profil;
            $profil5->setCode("ROLE_ADRST");
            $profil5->setLibelle("Agent de la DRST");
            $manager->persist($profil5);
            
            $profil6= new Profil;
            $profil6->setCode("ROLE_ADARPSL");
            $profil6->setLibelle("Agent de la DARPSL");
            $manager->persist($profil6);
            
            $profil7= new Profil;
            $profil7->setCode("ROLE_SRU");
            $profil7->setLibelle("Collaborateur SRU");
            $manager->persist($profil7);
            
            $manager->flush();
        
       
    }
    /**
    * {@inheritdoc}
    */
    public function getOrder()
    {
    return 1;
    } 
    
}