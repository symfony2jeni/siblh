<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhAnalisisMicrobiologicoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
             //->add('codigoAnalisisMicrobiologico')
             ->add('coliformesTotales', 'choice', array(
             'choices' => array(
              'Negativo' => 'Negativo',
              'Positivo' => 'Positivo',),'required'    => true       /* se presente la opcion x defecto ausencia*/

                                                        )
                  )
                ->add('control', 'choice', array(
             'choices' => array(
              'N/A' => 'N/A',
                 
                               ),
             'required'    => true  
       /* se presente la opcion x defecto ausencia*/
                                                        )
                  )
             ->add('situacion', 'choice', array(
             'choices' => array(
              'Aceptada' =>  'Aceptada',
              'Resiembra' => 'Resiembra',               ),
             'required'    => true 
                    )

       /* repositorio*/ )
            ->add('idFrascoProcesado',null,array(
                'required' => true));
     
          //  ->add('codigoAnalisisMicrobiologico');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhAnalisisMicrobiologico'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhanalisismicrobiologico';
    }
}
