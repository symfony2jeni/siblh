<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhFrascoRecolectadoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigoFrascoRecolectado')
            ->add('volumenRecolectado')
            ->add('formaExtraccion')
            ->add('onzRecolectado')
            ->add('observacionFrascoRecolectado')
            ->add('idEstado')
            ->add('idDonacion')
            ->add('idDonante')
            ->add('idLoteAnalisis')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhFrascoRecolectado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhfrascorecolectado';
    }
}
