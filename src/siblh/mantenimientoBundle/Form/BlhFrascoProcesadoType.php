<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhFrascoProcesadoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('codigoFrascoProcesado')
            //->add('volumenFrascoPasteurizado')
            //->add('acidezTotal')
            //->add('kcaloriasTotales')
            ->add('observacionFrascoProcesado', 'textarea')
          //  ->add('volumenDisponibleFp')
          //  ->add('usuario')
             ->add('idEstado')
            ->add('idPasteurizacion')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhFrascoProcesado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhfrascoprocesado';
    }
    
  
    
}