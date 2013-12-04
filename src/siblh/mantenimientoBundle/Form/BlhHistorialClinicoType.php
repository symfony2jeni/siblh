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
            ->add('amenorrea','text')
            ->add('controlPrenatal', 'choice', 
                    array('choices' => array('' => ' ','Si' => 'Si',
                          'No' => 'No')))
            ->add('lugarControl')
            ->add('numeroControl', 'text')
            ->add('fechaUltimaRegla', 'date', 
                    array(  'widget' => 'single_text',
                            'format' => 'yy-MM-dd',
                            'attr' => array('class' => 'date')))
            ->add('fechaParto', 'date', 
                    array(  'widget' => 'single_text',
                            'format' => 'yy-MM-dd',
                            'attr' => array('class' => 'date')))
            ->add('lugarParto','text', array('required'=>'false'))
            ->add('patologiaEmbarazo','text', array('required'=>'false'))

            ->add('periodoIntergenesico', 'text')
            ->add('fechaPartoAnterior', 'date', 
                    array(  'widget' => 'single_text',
                            'format' => 'yy-MM-dd',
                            'attr' => array('class' => 'date')))
             ->add('formulaObstetricaG','text',array('max_length'=>'2'))
            ->add('formulaObstetricaP1','text',array('max_length'=>'2'))
            ->add('formulaObstetricaP2','text',array('max_length'=>'2'))
            ->add('formulaObstetricaA','text',array('max_length'=>'2'))
            ->add('formulaObstetricaV','text',array('max_length'=>'2'))
            ->add('formulaObstetricaM','text',array('max_length'=>'2'))
            ->add('idDonante')
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
