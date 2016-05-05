<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Mention;
use BZ\ModelBundle\Form\MentionType;

class MentionController extends Controller
{
    public function create_mentionAction()
    {
            $mention= new Mention;
            $mention->setEstdelete(false);
            $mention->setLoginpersist($this->getUser()->getUsername());
            $mention->setDatepersist(new \ Datetime());
            $form = $this->createForm(new MentionType(), $mention); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($mention);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Mention:create_mention.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_mentionAction()
    {
            $mentions= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Mention')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:Mention:read_mention.html.twig', 
                     array('menu_num' => 1, 'mentions' => $mentions));             
    }
    
    public function update_mentionAction($id)
    {
            $mention= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Mention')
                                      ->find($id);
            $mention->setLoginpersist($this->getUser()->getUsername());
            $mention->setDatepersist(new \ Datetime());
            $form = $this->createForm(new MentionType(), $mention); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Mention:update_mention.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_mentionAction($id)
    {
            $mention= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Mention')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $mention->setLogindelete($this->getUser()->getUsername());
                    $mention->setDatedelete(new \ Datetime());
                    $mention->setEstdelete(true);
                    $em->flush();
            }
            $element=$mention->getLibelle();
             return $this->render('BZVueBundle:Mention:delete_mention.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
    public function print_mentionAction()
    {
            $mentions= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Mention')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView('BZVueBundle:Mention:print_mention.html.twig', array( 'mentions' => $mentions));
            //on appelle le service html2pdf
            $html2pdf = $this->get('html2pdf_factory')->create();
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('real');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('Liste_des_mentions.pdf'), 200, array('Content-Type' => 'application/pdf'));
                       
    }
}
