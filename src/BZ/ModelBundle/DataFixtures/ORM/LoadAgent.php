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
                    $modesaisine->setLibelle('Plate-forme *SysGRU*');
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
        $agent = new Agent();
        $agent->setNom("FADONOUGBO");
        $agent->setPrenom("Emile");
        $agent->setLoginpersist("admin");
        $agent->setEstdelete(false);
//        $agent->setService(null);
        $agent->setUser($user);
        // On le persiste
        $manager->persist($agent);
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