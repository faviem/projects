<?php

namespace BZ\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class AdresseContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           
            ->add('telmobile', 'text', array(
            'label' => 'Contact(s)',
             'attr' =>array(
            'class' =>'form-control'
            )))
                
            ->add('ville','entity', array('label' => 'Ville de résidence', 
                'class' => 'BZModelBundle:Ville',
                'property' => 'nomville',
                'empty_value' => '--Choisissez la ville de résidence--',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('v')
                                        ->where('v.estdelete = 0')
                                          ->orderBy('v.nomville', 'ASC');
                        }))
                        
            ->add('departement','entity', array('label' => 'Département', 
                'class' => 'BZModelBundle:Departement',
                'property' => 'nomdepartement',
                'empty_value' => '--Choisissez le département--',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('d')
                                        ->where('d.estdelete = 0')
                                          ->orderBy('d.nomdepartement', 'ASC');
                        }))
                        
               ->add('quartier','entity', array('label' => 'Quartier de ville ou village', 
                'class' => 'BZModelBundle:Quartier',
                'property' => 'libelle',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => false,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('q')
                                          ->orderBy('q.libelle', 'ASC')
                                          ->where('q.estdelete = 0');
                        }))   
                                
            ->add('details', 'textarea', array(
            'label' => 'Autres détails adresses',
             'attr' =>array(
            'class' =>'form-control'
             )))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\AdresseContact'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_adressecontact';
    }
}
