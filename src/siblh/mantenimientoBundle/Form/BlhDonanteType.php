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


        echo 'pruebaaaa';
        $builder
                

            ->add('codigoDonante')
            ->add('primerNombre')
            ->add('segundoNombre')
            ->add('primerApellido')
            ->add('segundoApellido')
            ->add('fechaNacimiento')
            ->add('fechaRegistroDonanteBlh')
            ->add('direccion')
            ->add('procedencia')
            ->add('registro')
            ->add('numeroDocumentoIdentificacion')
            ->add('documentoIdentificacion')
            ->add('ocupacion')
            ->add('estadoCivil')
            ->add('nacionalidad')
            ->add('escolaridad')
            ->add('tipoColecta')
            ->add('observaciones')
            ->add('idBancoDeLeche')
            ->add('idMunicipio')
            ->add('procedencia')
            ->add('fechaRegistroDonanteBlh')   
            ->add('registro')
            ->add('fechaNacimiento')
            ->add('estadoCivil')
            ->add('nacionalidad')
            ->add('direccion')
            ->add('documentoIdentificacion')
            ->add('numeroDocumentoIdentificacion')
            ->add('idBancoDeLeche')
            ->add('ocupacion')
            ->add('escolaridad')
            ->add('tipoColecta')
            ->add('observaciones')
         
            ->add('idMunicipio')
            ->add('observaciones')
          /*->add('edad')
    
            ->add('estadoDonante')*/
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
