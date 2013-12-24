<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhSeguimientoReceptorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('tallaReceptor')
            ->add('pesoSeguimiento')
            ->add('pcSeguimiento')
            ->add('gananciaDiaPeso')
            ->add('semana','text')
            ->add('fechaSeguimiento','date', 
                    array(  'widget' => 'single_text',
                            'format' => 'yy-MM-dd',
                            'attr' => array('class' => 'date')))
            ->add('gananciaDiaTalla')
            ->add('complicaciones', 'textarea',array('max_length'=>'50'))
            ->add('observacion')
            ->add('periodoEvaluacion')
            ->add('gananciaDiaPc')
            ->add('usuario')
       ->add('idReceptor')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhSeguimientoReceptor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhseguimientoreceptor';
    }
}