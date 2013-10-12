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
            ->add('direccion')
            ->add('procedencia')
            ->add('registro')
            ->add('numeroDocumentoIdentificacion')
            ->add('documentoIdentificacion', 'choice', 
                    array('choices' => array('' => 'Seleccione un valor','DUI' => 'DUI',
                          'Pasaporte' => 'Pasaporte',
                          'Carnet de Minoridad' => 'Carnet de Minoridad')))
            ->add('ocupacion')
            ->add('estadoCivil', 'choice', 
                    array('choices' => array('' => 'Seleccione un valor','Soltera' => 'Soltera',
                          'Casada' => 'Casada',
                          'Acompañada' => 'Acompañada',
                          'Viuda' => 'Viuda')))
            ->add('nacionalidad')
            ->add('escolaridad')
            ->add('tipoColecta', 'choice',
                    array('choices' => array ('' => 'Seleccione un valor', 
                        'Domiciliar' => 'Domiciliar', 'BLH'=> 'BLH'))) 
            ->add('observaciones', 'textarea')
            ->add('idBancoDeLeche')
            ->add('idMunicipio')
            ->add('procedencia')
            ->add('registro')
            ->add('nacionalidad')
            ->add('direccion')
            ->add('estadoDonante', 'choice', 
                    array('choices' => array('' => 'Seleccione un valor','Apta' => 'Apta',
                          'No Apta' => 'No Apta',
                          'Estimulacion' => 'Estimulacion')))
                
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
