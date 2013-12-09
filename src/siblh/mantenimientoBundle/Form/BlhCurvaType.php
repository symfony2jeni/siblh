<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhCurvaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           
           ->add('tiempo1','number', array ( 'invalid_message'=>'Debe ser entre 5 y 10'))
            ->add('tiempo2', 'number', array ( 'invalid_message'=>'Debe ser entre 5 y 10'))
            ->add('tiempo3','number', array ( 'invalid_message'=>'Debe ser entre 5 y 10'))
            /*->add('valorCurva') */
            ->add('fechaCurva',  'date', 
                    array(  'widget' => 'single_text',
                            'format' => 'yy-MM-dd',
                            'attr' => array('class' => 'date'
                                ), 'required'=> true ))
            ->add('cantidadFrascos','number')
            ->add('volumenPorFrasco','number')
            ->add('horaInicioCurva')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhCurva'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhcurva';
    }
}
