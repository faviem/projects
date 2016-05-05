<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ReponseTraitementRequeteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('mention','entity', array('label' => 'Appréciation', 
                'class' => 'BZModelBundle:Mention',
                'property' => 'libelle',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('m')
                                          ->orderBy('m.libelle', 'ASC')
                                          ->where('m.estdelete = 0');
                        }))
            ->add('commentaireReponse','textarea',array('label' => 'Commentaire de l\'usager/client', 'required' => true,'attr' =>array('class' =>'form-control')))
          
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\ReponseTraitementRequete'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_reponsetraitementrequete';
    }
}
