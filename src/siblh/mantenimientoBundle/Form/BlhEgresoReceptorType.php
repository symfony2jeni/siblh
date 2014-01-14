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
            ->add('fechaEgreso', 'date', 
                    array(  'widget' => 'single_text',
                            'format' => 'yy-MM-dd',
                            'attr' => array('class' => 'date')))
            ->add('estanciaHospitalaria', 'text')
            ->add('idReceptor')
            ->add('hospitalSeguimientoEgreso', 'choice', 
                    array('choices' => array('' => 'Seleccione Hospital de seguimiento',
                            'Sin Seguimiento' => 'Sin Seguimiento',
                            'Hospital Nacional San Salvador Maternidad Dr. Raúl Arguello Escolan ' => 'Hospital Nacional San Salvador Maternidad Dr. Raúl Arguello Escolan ',
                            'Hospital Nacional Santa Ana San Juan de Dios' => 'Hospital Nacional Santa Ana San Juan de Dios',
                            'Hospital Nacional San Miguel  SM San Juan de Dios' => 'Hospital Nacional San Miguel  SM San Juan de Dios',
                            'Hospital Nacional Metapán Dr. Arturo Morales' => 'Hospital Nacional Metapán Dr. Arturo Morales',
                            'Hospital Nacional Chalchuapa ' => 'Hospital Nacional Chalchuapa ',
                            'Hospital Nacional Sonsonate Dr. Jorge Mazzini Villacorta' => 'Hospital Nacional Sonsonate Dr. Jorge Mazzini Villacorta',
                            'Hospital Nacional Chalatenango Dr. Luis Edmundo Vásquez' => 'Hospital Nacional Chalatenango Dr. Luis Edmundo Vásquez',
                            'Hospital Nacional Nueva Concepción ' => 'Hospital Nacional Nueva Concepción ',
                            'Hospital Nacional Santa Tecla San Rafael' => 'Hospital Nacional Santa Tecla San Rafael',
                            'Hospital Nacional Ilopango Enf. Angélica Vidal de Najarro' => 'Hospital Nacional Ilopango Enf. Angélica Vidal de Najarro',
                            'Hospital Nacional Mejicanos (Zacamil) Dr. Juan José Fernández' => 'Hospital Nacional Mejicanos (Zacamil) Dr. Juan José Fernández',  
                            'Hospital Nacional San Salvador Neumológico Dr. José A. Saldaña' => 'Hospital Nacional San Salvador Neumológico Dr. José A. Saldaña',
                            'Hospital Nacional San Salvador Rosales' => 'Hospital Nacional San Salvador Rosales',
                            'Hospital Nacional San Salvador Benjamin Bloom' => 'Hospital Nacional San Salvador Benjamin Bloom',
                            'Hospital Nacional Soyapango Dr. José Molina Martínez' => 'Hospital Nacional Soyapango Dr. José Molina Martínez',
                            'Hospital Nacional Cojutepeque Nuestra Senora de Fátima' => 'Hospital Nacional Cojutepeque Nuestra Señora de Fátima',
                            'Hospital Nacional Suchitoto' => 'Hospital Nacional Suchitoto',
                            'Hospital Nacional Zacatecoluca Santa Teresa' => 'Hospital Nacional Zacatecoluca Santa Teresa',
                            'Hospital Nacional Ilobasco Dr. José Luis Saca' => 'Hospital Nacional Ilobasco Dr. José Luis Saca',
                            'Hospital Nacional Sensuntepeque' => 'Hospital Nacional Sensuntepeque',
                            'Hospital Nacional San Vicente Santa Gertrudis' => 'Hospital Nacional San Vicente Santa Gertrudis',
                            'Hospital Nacional Jiquilisco' => 'Hospital Nacional Jiquilisco',
                            'Hospital Nacional Santiago de María Dr. Jorge Arturo Mena' => 'Hospital Nacional Santiago de María Dr. Jorge Arturo Mena',
                            'Hospital Nacional Usulután San Pedro' => 'Hospital Nacional Usulután San Pedro',
                            'Hospital Nacional Ciudad Barrios Monsenor Oscar Arnulfo Romero' => 'Hospital Nacional Ciudad Barrios Monseñor Oscar Arnulfo Romero',
                            'Hospital Nacional Nueva Guadalupe' => 'Hospital Nacional Nueva Guadalupe',
                            'Hospital Nacional San Francisco Gotera Dr. Héctor Antonio Hernández Flores' => 'Hospital Nacional San Francisco Gotera Dr. Héctor Antonio Hernández Flores',
                            'Hospital Nacional La Unión' => 'Hospital Nacional La Unión',
                            'Hospital Nacional Santa Rosa de Lima' => 'Hospital Nacional Santa Rosa de Lima',
                            'Hospital Nacional Ahuachapán Dr. Francisco Menéndez' => 'Hospital Nacional Ahuachapán Dr. Francisco Menéndez')))
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