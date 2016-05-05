<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Agent;
use BZ\UserBundle\Entity\User;
use BZ\ModelBundle\Form\AgentType;

class AgentController extends Controller
{
    public function create_agentAction()
    {
            
            $newuser = new User;
            $newuser->setEnabled(true);
             $newuser->setType('DIP');
            $agent= new Agent;
            $agent->setEstdelete(false);
            $agent->setLoginpersist($this->getUser()->getUsername());
            $agent->setDatepersist(new \ Datetime());
            $agent->setUser($newuser);
            $form = $this->createForm(new AgentType(), $agent); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($newuser);
                    $em->flush();
                    $em->persist($agent);
                    $newuser->setAgent($agent);
                    $em->flush();
                    return $this->redirect( $this->generateUrl('read_agent'));
                }
            }
             return $this->render('BZVueBundle:Agent:create_agent.html.twig', 
                     array('menu_num' => 2, 'form'   => $form->createView()));             
    }
    
    public function read_agentAction()
    {
            $agents= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Agent')
                                      ->findBy(Array('estdelete'=>false),Array('nom'=>'ASC','prenom'=>'ASC'));
             return $this->render('BZVueBundle:Agent:read_agent.html.twig', 
                     array('menu_num' => 2, 'agents' => $agents));             
    }
    
    public function update_agentAction($id)
    {
            $agent= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Agent')
                                      ->find($id);
            $agent->setLoginpersist($this->getUser()->getUsername());
            $agent->setDatepersist(new \ Datetime());
            $form = $this->createForm(new AgentType(), $agent); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                    $userManager = $this->get('fos_user.user_manager');
                    $userManager->reloadUser($agent->getUser());
                        return $this->redirect( $this->generateUrl('read_agent'));
                }
            }
//            $motpasse= $agent->getUser()->getPlainPassword();
             return $this->render('BZVueBundle:Agent:update_agent.html.twig', 
                     array('menu_num' => 2, 'form'   => $form->createView(),'id' => $id));             
    }
    
    public function compte_agentAction()
    {
        
            $agent= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Agent')
                                      ->findOneBy(Array('user'=>$this->getUser()->getId()));
            $agent->setLoginpersist($this->getUser()->getUsername());
            $agent->setDatepersist(new \ Datetime());
            $form = $this->createForm(new AgentType(), $agent); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                    $userManager = $this->get('fos_user.user_manager');
                    $userManager->reloadUser($agent->getUser());
                   return $this->redirect( $this->generateUrl('page_accueil'));
                }
            }
//            $motpasse= $agent->getUser()->getPlainPassword();
             return $this->render('BZVueBundle:Agent:compte_agent.html.twig', 
                     array('menu_num' => 2, 'form'   => $form->createView()));             
    }
    
    public function delete_agentAction($id)
    {
            $agent= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Agent')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $agent->setLogindelete($this->getUser()->getUsername());
                    $agent->setDatedelete(new \ Datetime());
                    $agent->setEstdelete(true);
                    $agent->getUser()->setEnabled(false);
                    $userManager = $this->get('fos_user.user_manager');
                    $userManager->reloadUser($agent->getUser());
                    $em->flush();
            }
            $element='Compte : '.$agent->getNom().'  '.$agent->getPrenom();
             return $this->render('BZVueBundle:Agent:delete_agent.html.twig', 
                     array('menu_num' => 2,'id' => $id, 'element' => $element ));             
    }
    
    public function edit_agentAction($id)
    {
            $agent= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Agent')
                                      ->find($id);
            
             return $this->render('BZVueBundle:Agent:edit_agent.html.twig', 
                     array('menu_num' => 2, 'element' => $agent ));             
    }
    
    public function print_agentAction()
    {
            $agents= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Agent')
                                      ->findBy(Array('estdelete'=>false),Array('nom'=>'ASC','prenom'=>'ASC'));
             //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView('BZVueBundle:Agent:print_agent.html.twig', array( 'agents' => $agents));
            //on appelle le service html2pdf
//            $html2pdf = $this->get('html2pdf_factory')->create();
            $html2pdf = $this -> get('html2pdf_factory') -> create('L', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('fullpage');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('Liste_des_agents.pdf'), 200, array('Content-Type' => 'application/pdf'));
                       
    }
}
