<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhIngresoReceptorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pesoReceptor')
            ->add('duracionCpap')
            ->add('clasificacionLubchengo')
            ->add('diagnosticoIngreso')
            ->add('duracionNpt')
            ->add('apgar')
            ->add('edadGestFur')
            ->add('duracionVentilacion')
            ->add('edadGestBallard')
            ->add('pc')
            ->add('tallaIngreso')
            ->add('idReceptor')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhIngresoReceptor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhingresoreceptor';
    }
}
