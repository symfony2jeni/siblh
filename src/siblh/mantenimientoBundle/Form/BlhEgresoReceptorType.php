<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhEgresoReceptorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('diagnosticoEgreso','textarea',array('max_length'=>'50'))
            ->add('madreCanguro', 'choice', 
                    array('choices' => array('' => ' ','Si' => 'Si',
                          'No' => 'No')))
            ->add('tipoEgreso', 'choice', 
                    array('choices' => array('' => 'Seleccione un valor','Alta' => 'Alta',
                          'Muerte' => 'Muerte')))
            ->add('comentarioEgreso','textarea',array('max_length'=>'150'))
            ->add('trasladoPeriferico', 'choice', 
                    array('choices' => array('' => ' ','Si' => 'Si',
                          'No' => 'No')))
            ->add('permanenciaUcin', 'text')
            ->add('hospitalSeguimientoEgreso')
            ->add('fechaEgreso', 'date', 
                    array(  'widget' => 'single_text',
                            'format' => 'yy-MM-dd',
                            'attr' => array('class' => 'date')))
            ->add('estanciaHospitalaria', 'text')
            ->add('idReceptor')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhEgresoReceptor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhegresoreceptor';
    }
}