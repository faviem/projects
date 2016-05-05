<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class TraitementRequeteType extends AbstractType
{
    private $id;
     public function __construct($id)
        {
            $this->id = $id;
        }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $id=$this->id;
        $builder
           
            ->add('directeurtechnique','entity', array('label' => 'Directeur-Responsable Technique', 
                'class' => 'BZModelBundle:DirecteurTechnique',
                'property' => 'nomprenom',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )   use ($id)
                        {
                                return $er->createQueryBuilder('d')
                                          ->Where('d.structuresoustutelle =:id')
                                          ->andWhere('d.estdelete = 0')
                                        ->setParameter('id', $id);
                        }))
            ->add('commentaireLancement','textarea',array('label' => 'Message de doléance', 'required' => true,'attr' =>array('class' =>'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\TraitementRequete'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_traitementrequete';
    }
}
