<?php

namespace BZ\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use BZ\ModelBundle\Form\FileIdentiteType;
use Doctrine\ORM\EntityRepository;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
         ->add('username','text',array('label' => 'Login', 'required' => true,'attr' =>array('class' =>'form-control','placeholder' =>'Enrer le login')))
           ->add('plainPassword','password',array('label' => 'Mot de Passe', 'required' => true,'attr' =>array('class' =>'form-control','placeholder' =>'Enrer le mot de passe')))
            ->add('email','text',array('label' => 'e@mail', 'required' => true,'attr' =>array('class' =>'form-control','placeholder' =>'Enrer email')))
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
            ->add('adressecontact', new AdresseContactType(),array('label' => false, 'required' => false))
            ->add('fileidentite', new FileIdentiteType(),array('label' => false, 'required' => false))
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
