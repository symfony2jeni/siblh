<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhHistorialClinicoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amenorrea')
            ->add('controlPrenatal')
            ->add('lugarControl')
            ->add('numeroControl')
            ->add('fechaUltimaRegla')
            ->add('fechaParto')
            ->add('lugarParto')
            ->add('patologiaEmbarazo')
            ->add('periodoIntergenesico')
            ->add('fechaPartoAnterior')
            ->add('formulaObstetricaG')
            ->add('formulaObstetricaP1')
            ->add('formulaObstetricaP2')
            ->add('formulaObstetricaA')
            ->add('formulaObstetricaV')
            ->add('formulaObstetricaM')
            ->add('idDonante')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhHistorialClinico'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhhistorialclinico';
    }
}
