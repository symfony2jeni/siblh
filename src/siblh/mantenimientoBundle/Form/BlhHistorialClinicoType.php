<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhHistorialClinicoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
<<<<<<< HEAD
=======

>>>>>>> desarrollo
            ->add('amenorrea')
            ->add('controlPrenatal')
            ->add('lugarControl')
            ->add('numeroControl')
            ->add('fechaUltimaRegla')
            ->add('fechaParto')
            ->add('lugarParto')
            ->add('patologiaEmbarazo')
            ->add('periodoIntergenesico')
            ->add('fechaPartoAnterior')
            ->add('formulaObstetrica')
            ->add('idDonante')
<<<<<<< HEAD
=======

             ->add('idDonante')
             ->add('formulaObstetrica')
             ->add('periodoIntergenesico')
             ->add('controlPrenatal', 'choice', array('choices' => array('si' => 'Si', 'no' => 'No')))
             ->add('lugarControl')
             ->add('numeroControl')
             ->add('fechaUltimaRegla')
             ->add('fechaPartoAnterior')
             ->add('fechaParto')
             ->add('amenorrea')

             ->add('lugarParto')
             ->add('patologiaEmbarazo')
            

             ->add('lugarParto','text', array( 'required'=>'false'))
             ->add('patologiaEmbarazo','text', array( 'required'=>'false'))
                
             //   ->add('lugarParto','text', array( 'required'=>'false'))
            //lista desplegable: , 'choice', array('choices' => array('si' => 'Si', 'no' => 'No'))

>>>>>>> desarrollo
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhHistorialClinico'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhhistorialclinico';
    }
}
