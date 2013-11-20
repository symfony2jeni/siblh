<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhPasteurizacionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigoPasteurizacion')
            ->add('numCiclo')
            ->add('volumenPasteurizado')
            ->add('numFrascosPasteurizados', 'text')
            ->add('fechaPasteurizacion', 'date', 
                    array(  'widget' => 'single_text',
                            'format' => 'yy-MM-dd',
                            'attr' => array('class' => 'date')))
            ->add('horaInicioP')
            ->add('horaFinalP')
            ->add('horaInicioE')
            ->add('horaFinalE')
            ->add('responsablePasteurizacion')
            ->add('idCurva')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhPasteurizacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhpasteurizacion';
    }
}
