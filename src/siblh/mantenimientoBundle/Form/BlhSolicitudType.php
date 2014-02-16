<?php

namespace siblh\mantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlhSolicitudType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
             //->add('codigoSolicitud')
            ->add('volumenPorDia')
            ->add('acidezNecesaria','choice', 
                    array('choices' => array('' => 'Seleccione un valor','Baja' => 'Baja(0-4 grados)','Aceptable' => 'Aceptable(4-8 grados)')))

            ->add('caloriasNecesarias', 'choice', 
                    array('choices' => array('' => 'Seleccione un valor','Hipocalorica' => 'Hipocalorica(<500)',
                          'Normocalorica' => 'Normocalorica(500-700)',
                          'Hipercalorica' => 'Hipercalorica(>700)')))
            ->add('pesoDia')
            ->add('volumenPorToma')
            ->add('tomaPorDia','text')
            ->add('fechaSolicitud' ,'date', 
                    array(  'widget' => 'single_text',
                            'format' => 'y-MM-dd',
                            'attr' => array('class' => 'date')))
            ->add('cuna', 'text')
            ->add('estado','choice', 
                    array('choices' => array('Pendiente' => 'Pendiente','Agrupada' => 'Agrupada','Despachada' => 'Despachada')))
            ->add('responsable')
           // ->add('idGrupoSolicitud')
            ->add('idReceptor')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'siblh\mantenimientoBundle\Entity\BlhSolicitud'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siblh_mantenimientobundle_blhsolicitud';
    }
}