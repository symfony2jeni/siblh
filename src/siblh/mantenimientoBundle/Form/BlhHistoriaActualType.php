<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhHistoriaActualType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pesoDonante')
            ->add('tallaDonante', 'number', array ( 'invalid_message'=>'Debe ser entre 1.5 y 2'))
            ->add('medicamento')
            ->add('habitoToxico')
            ->add('motivoDonacion','textarea',array('max_length'=>'50'))
            ->add('patologiaDonante')
            ->add('imc')
            ->add('estadoDonante', 'choice', 
                    array('choices' => array('' => 'Seleccione un valor','Apta' => 'Apta',
                          'No Apta' => 'No Apta',
                          'Estimulacion' => 'Estimulacion')))
            ->add('idDonante')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhHistoriaActual'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhhistoriaactual';
    }
}
