<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhDonanteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //  ->add('codigoDonante')
            ->add('primerNombre')
            ->add('segundoNombre')
            ->add('primerApellido')
            ->add('segundoApellido')
             ->add('fechaNacimiento', 'date', 
                    array(  'widget' => 'single_text',
                            'format' => 'yy-MM-dd',
                            'attr' => array('class' => 'date')))
            ->add('fechaRegistroDonanteBlh', 'date', 
                    array(  'widget' => 'single_text',
                            'format' => 'yy-MM-dd',
                            'attr' => array('class' => 'date')))
            ->add('telefonoFijo')
            ->add('telefonoMovil')
            ->add('direccion')
           // ->add('procedencia')
            ->add('registro')
            ->add('numeroDocumentoIdentificacion')
            ->add('documentoIdentificacion', 'choice', 
                    array('choices' => array('' => 'Seleccione un valor','DUI' => 'DUI',
                          'Pasaporte' => 'Pasaporte',
                          'Minoridad' => 'Carnet de Minoridad')))
          //  ->add('edad')
            ->add('ocupacion')
            ->add('estadoCivil', 'choice', 
                    array('choices' => array('' => 'Seleccione un valor','Soltera' => 'Soltera',
                          'Casada' => 'Casada',
                          'Acompanada' => 'Acompañada',
                          'Viuda' => 'Viuda')))
            ->add('nacionalidad', 'text',array('data' => 'Salvadorena'))
            ->add('escolaridad', 'choice', 
                    array('choices' => array('' => 'Seleccione un valor','Primaria' => 'Primaria(1 - 6 grado)',
                          'Media' => 'Media(7 - 9 grado)',
                          'Secundaria' => 'Secundaria(Bachillerato)',
                          'Superior' => 'Superior(universidad)')))
            ->add('tipoColecta', 'choice',
                    array('choices' => array ('' => 'Seleccione un valor', 
                        'Domiciliar' => 'Domiciliar', 'BLH'=> 'BLH')))
            ->add('observaciones','textarea',array('max_length'=>'150'))
            ->add('estado', 'choice', 
                    array('choices' => array('Activa' => 'Activa',
                          'Inactiva' => 'Inactiva')))
          //  ->add('usuario')
               ->add('idBancoDeLeche')
            ->add('idMunicipio')
                
                
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhDonante'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhdonante';
    }
}