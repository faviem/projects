<?php

namespace BZ\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use BZ\ModelBundle\Form\FileIdentiteType;
use Doctrine\ORM\EntityRepository;

class ProfilType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('profil','entity', array('label' => 'Profil', 
                'class' => 'BZModelBundle:Profil',
                'property' => 'libelle',
                'empty_value' => '--Choisissez le profil--',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('p')
                                         ->where('p.code <>:param')
                                         ->setParameter('param','ROLE_RT')
                                          ->orderBy('p.libelle', 'ASC');
                                         
                        }))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_userbundle_user';
    }
}
