<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhReceptorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigoReceptor')
            ->add('fechaRegistroBlh', 'date', 
                    array(  'widget' => 'single_text',
                            'format' => 'yy-MM-dd',
                            'attr' => array('class' => 'date')))
            ->add('procedencia')

            ->add('estadoReceptor')
            ->add('edadDias', 'text')
            ->add('pesoReceptor')
             ->add('duracionCpap', 'text')
            ->add('clasificacionLubchengo')
             ->add('diagnosticoIngreso','textarea',array('max_length'=>'50'))
            ->add('duracionNpt', 'text')
            ->add('apgarPrimerMinuto', 'text')
            ->add('edadGestFur')
            ->add('duracionVentilacion', 'text')
            ->add('edadGestBallard')
            ->add('pc')
            ->add('tallaIngreso')
            ->add('apgarQuintoMinuto', 'text')
            ->add('usuario')
                     ->add('idBancoDeLeche')
            ->add('idPaciente')
			->add('usuario')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhReceptor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhreceptor';
    }
}