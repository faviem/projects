<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Message;
use BZ\ModelBundle\Entity\Emetteur;
use BZ\ModelBundle\Entity\Recepteur;
use BZ\ModelBundle\Form\MessageType;

class MessageController extends Controller
{
    
    public function messages_ecrireAction()
    {
            $users= $this->getDoctrine()
                                      ->getManager()->getRepository('BZUserBundle:User')
//                                      ->findBy(Array('locked'=>false),Array());
                                      ->findBy(Array('locked'=>false),Array());
             
            $emetteur=new Emetteur;
            $emetteur->setUser($this->getUser());
            $message= new Message;
            $message->setEmetteur($emetteur);
            $message->setDateEnvoi(new \ Datetime());
            $form = $this->createForm(new MessageType(), $message); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    foreach ($_POST['bz_users'] as $i)
                    {
                        $recepteur = new Recepteur;
                        $recepteur->setUser($this->getDoctrine()->getManager()->getRepository('BZUserBundle:User')->find($i));
                        $message->addRecepteur($recepteur);
                        $em->persist($message);
                    }
                    $em->flush();
//                    $emetteur->setMessage($message);
//                    $em->flush();
                    return $this->redirect( $this->generateUrl('messages_envoye'));
               }
            }
             return $this->render('BZVueBundle:Message:messages_ecrire.html.twig', 
                     array('menu_num' => 1, 'users' => $users, 'form'   => $form->createView()));             
    }
    
    public function supprime_emetteurAction($id)
    {
            $emetteur= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Emetteur')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
//                    $alerte->setLogindelete($this->getUser()->getUsername());
                    $emetteur->setDatedelete(new \ Datetime());
                    $emetteur->setEstdelete(true);
                    $em->flush();
            }
             return $this->render('BZVueBundle:Message:supprime_emetteur.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $emetteur ));             
    }
    
    public function supprime_recepteurAction($id)
    {
            $recepteur= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Recepteur')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
//                    $alerte->setLogindelete($this->getUser()->getUsername());
                    $recepteur->setDatedelete(new \ Datetime());
                    $recepteur->setEstdelete(true);
                    $em->flush();
            }
             return $this->render('BZVueBundle:Message:supprime_recepteur.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $recepteur ));             
    }
    
    public function detail_emetteurAction($id)
    {
            $recepteur= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Emetteur')
                                      ->find($id);
            
             return $this->render('BZVueBundle:Message:detail_emetteur.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $recepteur ));             
    }
    
    public function detail_recepteurAction($id)
    {
            $recepteur= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Recepteur')
                                      ->find($id);
                    $em = $this->getDoctrine()->getManager();
//                    $alerte->setLogindelete($this->getUser()->getUsername());
                    $recepteur->setDateLu(new \ Datetime());
                    $recepteur->setEstLu(true);
                    $em->flush();
             return $this->render('BZVueBundle:Message:detail_recepteur.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $recepteur ));             
    }
    
    public function repondre_recepteurAction($id)
    {
                    $messagerecu= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Recepteur')
                                      ->find($id);
                    $recepteur= new Recepteur;
                    $recepteur->setUser($messagerecu->getMessage()->getEmetteur()->getUser());
            $emetteur=new Emetteur;
            $emetteur->setUser($this->getUser());
            $message= new Message;
            $message->setEmetteur($emetteur);
            $message->addRecepteur($recepteur);
            $message->setDateEnvoi(new \ Datetime());
            $form = $this->createForm(new MessageType(), $message); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($message);
                    $messagerecu->setDateLu(new \ Datetime());
                    $messagerecu->setEstLu(true);
                    $em->flush();
                    return $this->redirect( $this->generateUrl('messages_envoye'));
               }
            }
             return $this->render('BZVueBundle:Message:repondre_recepteur.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $messagerecu, 'form'   => $form->createView() ));             
    }
    
    public function messages_recuAction()
    {
            $messages= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Recepteur')
                                      ->findBy(Array('estdelete'=>false, 'user'=>  $this->getUser()->getId()),Array('datepersist'=>'DESC'));
             return $this->render('BZVueBundle:Message:messages_recu.html.twig', 
                     array('menu_num' => 1, 'messages' => $messages));             
    }
    
    public function messages_envoyeAction()
    {
            $messages= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Emetteur')
                                      ->findBy(Array('estdelete'=>false, 'user'=>  $this->getUser()->getId()),Array('datepersist'=>'DESC'));
             return $this->render('BZVueBundle:Message:messages_envoye.html.twig', 
                     array('menu_num' => 1, 'messages' => $messages));             
    }
    
}
