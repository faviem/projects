<?php

namespace BZ\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\UserBundle\Entity\User;
use BZ\UserBundle\Form\ProfilType;
use Symfony\Component\HttpFoundation\Response;

/**
 * User controller.
 *
 */
class UserController extends Controller
{

    
    public function  deconnecterAction()
    {
        $entity=$this->getUser();
        $userManager = $this->get('fos_user.user_manager');
        $entity->setIsconnect(0);
        $userManager->updateUser($entity);
        return $this->redirect( $this->generateUrl('fos_user_security_logout'));
    }

    public function   bz_user_profilAction($id)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id' => $id));
        $form = $this->createForm(new ProfilType, $user); 
            $request = $this->get('request');
        if($request->getMethod() == 'POST') 
            {
//                $form->bind($request);
//                if ($form->isValid()) {
                $user->setRoles(array('roles'=>$user->getProfil()->getCode()));
                $userManager->updateUser($user);
                $userManager->reloadUser($user);
//                  }
            }
             return $this->render('BZUserBundle:User:profil.html.twig', 
                     array('menu_num' => 2, 'form'   => $form->createView(),'membre'  =>  $user,'id'  =>  $id));    
    }
//    
//    public function   bz_user_connecterAction()
//    {
//         $users= $this->getDoctrine()
//                                      ->getManager()->getRepository('BZUserBundle:User')
//                                      ->findBy(Array('enabled'=>true,'locked'=>false,'isconnect'=>1));
//             return $this->render('BZUserBundle:User:bz_user_connecter.html.twig', 
//                     array('menu_num' => 2, 'users' => $users));    
//    }
    
    public function   bz_user_lockAction($id)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id' => $id));
        $request = $this->get('request');
         if ($request->getMethod() == 'POST') 
          {
              $user->setLocked(true);
              $user->setEnabled(false);
              $userManager->updateUser($user);
              $userManager->reloadUser($user);
            }
        return $this->render('BZUserBundle:User:userkey.html.twig',array(
            'id' => $id,
            'menu_num'=> 1,
            'username'=> $user->getUsername(),
            ));  
    }
    
    public function   bz_user_unlockAction($id)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id' => $id));
        
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
              $user->setLocked(false);
              $user->setEnabled(true);
              $userManager->updateUser($user);
              $userManager->reloadUser($user);
            }
        return $this->render('BZUserBundle:User:userunkey.html.twig',array(
            'id' => $id,
            'menu_num'=> 1,
            'username'=> $user->getUsername(),
            ));  
    }
    
    public function logoutAction()
    {
//        throw new \RuntimeException('You must activate the logout in your security firewall configuration.');
                    
    }
   
      public function  voir_groupeAction()
    {
       $repository = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('BZUserBundle:User')->findBy(array('enabled' => true,'locked' => false));
       
       return $this->render('BZUserBundle:User:voir_groupe.html.twig',array(
            'membres' => $repository,
            'menu_num'=> 1,
            ));
    }
    
}
