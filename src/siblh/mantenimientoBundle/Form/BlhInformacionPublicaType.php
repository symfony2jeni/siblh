<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhInformacionPublicaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('tipo', 'choice', array(
             'choices' => array(
              'Estadistica' => 'Estadistica',
              'Informacion Tecnica' => 'Tecnica',
              'Charla' => 'Charla',
                               ),
             'required'    => true  ))
                    
            ->add('nombreDocumento','text',array(
               'required' => true))
                
            ->add('fechaPublicacion', 'date', 
                    array(  'widget' => 'single_text',
                            'format' => 'y-MM-dd',
                            'attr' => array('class' => 'date'
                                ), 'required'=> true ))
                
            ->add('idBancoDeLeche',null,array(
               'required' => true))
            ->add('file')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhInformacionPublica'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhinformacionpublica';
    }
}