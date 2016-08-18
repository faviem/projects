<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class QuartierType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                  ->add('arrondissement','entity', array('label' => 'Arrondissement (*)', 
                'class' => 'BZModelBundle:Arrondissement',
                'property' => 'libelle',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('a')
                                          ->orderBy('a.libelle', 'ASC')
                                          ->where('a.estdelete = 0');
                        }))   
            ->add('libelle', 'text', array(
            'label' => 'Libellé',
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
            'data_class' => 'BZ\ModelBundle\Entity\Quartier'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_alerte';
    }
}
