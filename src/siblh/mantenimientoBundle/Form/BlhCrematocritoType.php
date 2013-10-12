<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhCrematocritoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('crema1')
            ->add('crema2')
            ->add('crema3')
            ->add('ct1')
            ->add('ct2')
            ->add('ct3')
            ->add('mediaCrema')
            ->add('mediaCt')
            ->add('porcentajeCrema')
            ->add('kilocalorias')
            ->add('idFrascoRecolectado')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhCrematocrito'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhcrematocrito';
    }
}
