<?php

namespace BZ\ModelBundle\Form;

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
            'label' => 'Contact(s) (*)',
            'required' => true,
             'attr' =>array(
            'class' =>'form-control'
            )))
            ->add('email', 'email', array(
            'label' => 'e@mail (*)',
            'required' => true,
             'attr' =>array(
            'class' =>'form-control'
              )))     
              ->add('quartier','entity', array('label' => 'Zone de résidence (Communes - Arrondissements/Quartiers de ville ou villages)', 
                'class' => 'BZModelBundle:Quartier',
                'property' => 'libelle',
                'empty_value' => '',
                   'group_by' => 'parentName',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => false,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('q')
                                          ->orderBy('q.libelle', 'ASC')
                                          ->where('q.estdelete = 0');
                        }))          
            
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
