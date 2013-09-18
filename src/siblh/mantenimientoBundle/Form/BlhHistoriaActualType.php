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
            ->add('tallaDonante')
            ->add('medicamento')
            ->add('habitoToxico')
            ->add('motivoDonacion')
            ->add('patologiaDonante')
            ->add('imc')
            ->add('idDonante')
            ->add('idDonante')
            ->add('pesoDonante')
            ->add('tallaDonante')
            ->add('imc')
            ->add('medicamento')
            ->add('habitoToxico')
            ->add('patologiaDonante')
            ->add('motivoDonacion')

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
