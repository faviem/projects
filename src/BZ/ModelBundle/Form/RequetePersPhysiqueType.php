<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class RequetePersPhysiqueType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('modesaisine','entity', array('label' => 'Mode de saisine', 
                'class' => 'BZModelBundle:ModeSaisine',
                'property' => 'libelle',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('m')
                                          ->orderBy('m.libelle', 'ASC');
                                         
                        }))
            ->add('particulier', new ParticulierType(),array('label' => false, 'required' => false))
            ->add('typerequete','entity', array('label' => 'Type de requête', 
                'class' => 'BZModelBundle:TypeRequete',
                'property' => 'libelle',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('t')
                                          ->orderBy('t.libelle', 'ASC');
                                         
                        }))
            ->add('structuresoustutelle','entity', array('label' => 'Structure conernée', 
                'class' => 'BZModelBundle:StructureSoustutelle',
                'property' => 'designationStructure',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('s')
                                          ->orderBy('s.nom', 'ASC');
                                         
                        }))
            ->add('commentaireUsagerclient','textarea',array('label' => 'Message de votre requête', 'required' => true,'attr' =>array('class' =>'form-control')))
            ->add('filerequete', new FileRequeteType(),array('label' => 'Pièce justificative', 'required' => false))                       
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\Requete'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_requete';
    }
}
