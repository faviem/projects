<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SocieteEntrepriseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           
           ->add('nom','text',array('label' => 'Nom de votre structure (*) ', 'required' => true,'attr' =>array('class' =>'form-control')))
           ->add('raisonsociale','text',array('label' => 'Raison sociale (*) ', 'required' => true,'attr' =>array('class' =>'form-control')))
           ->add('domaineactivite','text',array('label' => 'Domaine d\'activité ', 'required' => false,'attr' =>array('class' =>'form-control')))
                ->add('numifu','text',array('label' => 'N° IFU', 'required' => false,'attr' =>array('class' =>'form-control')))
            ->add('numrccm','text',array('label' => 'N° RCCM', 'required' => false,'attr' =>array('class' =>'form-control')))
            ->add('usagerclient', new UsagerClientType(),array('label' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\SocieteEntreprise'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_societeentreprise';
    }
}
