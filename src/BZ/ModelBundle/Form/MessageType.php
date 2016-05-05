<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class MessageType extends AbstractType
{
//    private $id;
//     public function __construct($id)
//        {
//            $this->id = $id;
//        }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $id=$this->id;
        $builder
           
//          ->add('recepteurs','entity', array('label' => 'A (destinataires)', 
//                'class' => 'BZUserBundle:User',
//                'property' => 'nomPrenom',
//                'empty_value' => '',
//                'multiple' => true,
//                'attr' =>array('class' =>'form-control chzn-select'),
//                'required' => true,
//                'query_builder' => function(EntityRepository $er )  use ($id)
//                        {
//                                return $er->createQueryBuilder('u')
//                                        ->where('u.locked = 0')
//                                        ->andwhere('u.id not like :id')
//                                        ->setParameter('id',$id);
//                        }
//                        ))  
                        
             ->add('objet', 'text', array('label' => 'Objet', 'attr' =>array('class' =>'form-control')))           
                        
             ->add('messageEnvoi','textarea',array('label' => 'Contenu du Message', 'required' => true,'attr' =>array('class' =>'form-control')))           
       
             ->add('filerequete', new FileRequeteType(),array('label' => false, 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\Message'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_message';
    }
}
