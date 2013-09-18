<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

<<<<<<< HEAD

=======
>>>>>>> desarrollo
class BlhCurvaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tiempo1')
            ->add('tiempo2')
            ->add('tiempo3')
<<<<<<< HEAD
            /*->add('valorCurva') */
=======
            ->add('valorCurva')
>>>>>>> desarrollo
            ->add('fechaCurva')
            ->add('cantidadFrascos')
            ->add('volumenPorFrasco')
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
