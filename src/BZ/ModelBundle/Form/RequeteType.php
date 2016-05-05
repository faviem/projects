<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RequeteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateEmise')
            ->add('dateConsulter')
            ->add('delaitraitementprevu')
            ->add('typeusagerclient')
            ->add('dateCloturePrevue')
            ->add('estFonder')
            ->add('estResolu')
            ->add('codeRecepisse')
            ->add('estAvorterUsagerclient')
            ->add('dateAvorterUsagerclient')
            ->add('commentaireUsagerclient')
            ->add('filerequete')
            ->add('particulier')
            ->add('cloturerequete')
            ->add('societeentreprise')
            ->add('typerequete')
            ->add('alerte')
            ->add('structuresoustutelle')
            ->add('requetevulnerable')
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
