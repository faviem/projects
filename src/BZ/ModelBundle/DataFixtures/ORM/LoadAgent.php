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
use BZ\ModelBundle\Entity\Agent;
use BZ\ModelBundle\Entity\Profil;
use BZ\UserBundle\Entity\User;
use BZ\ModelBundle\Entity\ModeSaisine;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
class LoadAgent extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    
    public function load(ObjectManager $manager)
    {
        $toutmodesaisine= $manager->getRepository('BZModelBundle:ModeSaisine')->findAll();
        foreach ($toutmodesaisine as $element){
            $manager->remove($element);
        }
         $manager->flush();
        $toutprofil= $manager->getRepository('BZModelBundle:Profil')->findAll();
          foreach ($toutprofil as $element){
            $manager->remove($element);
        }
         $manager->flush();
          $toutagent= $manager->getRepository('BZModelBundle:Agent')->findAll();
        foreach ($toutagent as $element){
            $manager->remove($element);
        }
          $manager->flush();
        $toutuser= $manager->getRepository('BZUserBundle:User')->findAll();
        foreach ($toutuser as $element){
            $manager->remove($element);
        }
          $manager->flush();
          
        for($i=5; $i>0; $i--)
        {
            $modesaisine= new ModeSaisine;
            switch ($i)
            {
                case 5: 
                    $modesaisine->setLibelle('Appel téléphonique');
                    break;
                case 4: 
                    $modesaisine->setLibelle('Courier');
                    break;
                case 3: 
                    $modesaisine->setLibelle('Accueil du siège');
                    break;
                case 2: 
                    $modesaisine->setLibelle('Plate-forme SysGERUC');
                    break;
                case 1: 
                    $modesaisine->setLibelle('Autres');
                    break;
            }
            $manager->persist($modesaisine);
        }
        $manager->flush();
        $profil = new Profil;
        $profil->setCode("ROLE_ADMIN");
        $profil->setLibelle("Administrateur");
        $manager->persist($profil);
        $manager->flush();
        $user= new User;
        $user->setUsername('admin');        
        $user->setEnabled(true);
        $user->setEmail('faviem2012@gmail.com');
        $user->setPlainPassword('admin');
        $user->setType('DIP');
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setProfil($profil);
        $manager->persist($user);
        $manager->flush();
        $agent = new Agent();
        $agent->setNom("FADONOUGBO");
        $agent->setPrenom("Emile");
        $agent->setLoginpersist("admin");
        $agent->setEstdelete(false);
//        $agent->setService(null);
        $agent->setUser($user);
        // On le persiste
        $manager->persist($agent);
        $user->setAgent($agent);
        $manager->flush();
        
        $profil3 = new Profil;
        $profil3->setCode("ROLE_DDIP");
        $profil3->setLibelle("Directeur de l'Informatique et du Pré-archivage");
        $manager->persist($profil3);
        $manager->flush();
        $profil1 = new Profil;
        $profil1->setCode("ROLE_CSRU");
        $profil1->setLibelle("Chef Service des Relations avec les Usagers/clients");
        $manager->persist($profil1);
        $manager->flush();
        $profil2 = new Profil;
        $profil2->setCode("ROLE_CSI");
        $profil2->setLibelle("Chef Service Informatique");
        $manager->persist($profil2);
        $manager->flush();
         $profil4 = new Profil;
        $profil4->setCode("ROLE_RT");
        $profil4->setLibelle("Directeur ou Responsable Technique");
        $manager->persist($profil4);
        $manager->flush();
        $profil5 = new Profil;
        $profil5->setCode("ROLE_SRU");
        $profil5->setLibelle("Collaborateur CSRU");
        $manager->persist($profil5);
        $manager->flush();
        $profil6 = new Profil;
        $profil6->setCode("ROLE_ADRST");
        $profil6->setLibelle("Responsable Division ADRST");
        $manager->persist($profil6);
        $manager->flush();
        $profil7 = new Profil;
        $profil7->setCode("ROLE_ADARPSL");
        $profil7->setLibelle("Responsable Division ADARPSL");
        $manager->persist($profil7);
        $manager->flush();
        $profil8 = new Profil;
        $profil8->setCode("ROLE_USER");
        $profil8->setLibelle("Membre");
        $manager->persist($profil8);
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