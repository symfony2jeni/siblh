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
             ->add('coliformesTotales', 'choice', array(
             'choices' => array(
              'Negativo' => 'Ausencia',
              'Positivo' => 'Presencia',),'required'    => true      
                 /* se presente la opcion x defecto ausencia*/

                  ))
                
                ->add('control', 'choice', array(
             'choices' => array(
              'N/A' => 'N/A',
              'Negativo' => 'Ausencia',
              'Positivo' => 'Presencia',),'required'    => true 
                    
       
                   ))
                
             ->add('situacion', 'choice', array(
             'choices' => array(
              'Acepta' =>  'Acepta',
              'Rechaza' =>  'Rechaza',   
              'Resiembra' => 'Resiembra',), 'required'    => true 
                    ) )
                
                
            ->add('idFrascoProcesado',null,array(
                'required' => true));
     
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
