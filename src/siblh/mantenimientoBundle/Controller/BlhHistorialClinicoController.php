<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhHistorialClinico;
use siblh\mantenimientoBundle\Form\BlhHistorialClinicoType;

/**
 * BlhHistorialClinico controller.
 *
 * @Route("/blhhistorialclinico")
 */
class BlhHistorialClinicoController extends Controller
{

    /**
     * Lists all BlhHistorialClinico entities.
     *
     * @Route("/", name="blhhistorialclinico")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
      $entities = $em->getRepository('siblhmantenimientoBundle:BlhHistorialClinico')->findAll();
         //Obtener banco de leche//              
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 
       $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
       $id_blh = $queryb->getResult(); 
       $codigo=$id_blh[0]['id']; 
       $query = $em->createQuery("SELECT hc.id, d.codigoDonante as codigo_donante, d.primerNombre as nombre1, d.segundoNombre as nombre2, 
            d.primerApellido as apellido1, d.segundoApellido as apellido2,
            hc.amenorrea, hc.controlPrenatal, hc.lugarControl, hc.numeroControl,
            hc.fechaUltimaRegla, hc.fechaParto, hc.lugarParto, hc.patologiaEmbarazo, hc.periodoIntergenesico, hc.fechaPartoAnterior,
            hc.formulaObstetricaG, hc.formulaObstetricaP1, hc.formulaObstetricaP2, hc.formulaObstetricaA, hc.formulaObstetricaV,
            hc.formulaObstetricaM
       FROM siblhmantenimientoBundle:BlhHistorialClinico hc join hc.idDonante d where 
       d.idBancoDeLeche = $codigo");
       $donantes_registradas  = $query->getResult();
       
       
       
        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
            'donantes_registradas' =>  $donantes_registradas, 
        );
    }
    /**
     * Creates a new BlhHistorialClinico entity.
     *
     * @Route("/", name="blhhistorialclinico_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhHistorialClinico:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhHistorialClinico();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
            $entity->setUsuario($usuario);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhhistorialclinico_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhHistorialClinico entity.
    *
    * @param BlhHistorialClinico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhHistorialClinico $entity)
    {
        $form = $this->createForm(new BlhHistorialClinicoType(), $entity, array(
            'action' => $this->generateUrl('blhhistorialclinico_create'),
            'method' => 'POST',
        ));

     //   $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    
    /**
     * Finds and displays a BlhHistorialClinico entity.
     *
     * @Route("/{id}", name="blhhistorialclinico_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT p.id as identificador, p.codigoDonante as codigo_donante, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.primerApellido as apellido1, p.segundoApellido as apellido2 FROM siblhmantenimientoBundle:BlhHistorialClinico hc join hc.idDonante p  WHERE hc.id = $id "); 
        $datos_donantes  = $query->getResult();
        
        
       
     //   $donante = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($id);   
       $donante = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($datos_donantes[0]['identificador']);

         //Obtener banco de leche//
            
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
         if (!$datos_donantes) {
            throw $this->createNotFoundException('Unable to find BlhDonante entity');
        }        

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistorialClinico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhHistorialClinico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $entity->setIdDonante($donante);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'datos_donantes' =>  $datos_donantes, 
            'hospital' => $establecimiento,
        );
    }

    /**
     * Displays a form to edit an existing BlhHistorialClinico entity.
     *
     * @Route("/{id}/edit", name="blhhistorialclinico_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //Obtener banco de leche//
            
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistorialClinico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhHistorialClinico entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
           'delete_form' => $deleteForm->createView(),
            'hospital' => $establecimiento,
        );
    }

    /**
    * Creates a form to edit a BlhHistorialClinico entity.
    *
    * @param BlhHistorialClinico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhHistorialClinico $entity)
    {
        $form = $this->createForm(new BlhHistorialClinicoType(), $entity, array(
            'action' => $this->generateUrl('blhhistorialclinico_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

     //   $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing BlhHistorialClinico entity.
     *
     * @Route("/{id}", name="blhhistorialclinico_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhHistorialClinico:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistorialClinico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhHistorialClinico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity->setUsuario($usuario);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhhistorialclinico_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhHistorialClinico entity.
     *
     * @Route("/{id}", name="blhhistorialclinico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistorialClinico')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhHistorialClinico entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhhistorialclinico'));
    }

    /**
     * Creates a form to delete a BlhHistorialClinico entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhhistorialclinico_delete', array('id' => $id)))
            ->setMethod('DELETE')
          //  ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
  //Creando nuevo controlador
    
     //Creando Nuevos Controladores
     
     
    /**
     * Lists all BlhHistorialClinico entity.
     *
     * @Route("/donantes", name="blhhistorialclinico_donantes")
     * @Method("GET")
     * @Template()
     */
 
 public function donantesAction()
    {
        $em = $this->getDoctrine()->getManager();   
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();       
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $queryb->getResult(); 
        $codigo=$id_blh[0]['id']; 
        //Obteniendo lista de donantes" 
        $query = $em->createQuery("SELECT p.id as identificador, p.codigoDonante as codigo_donante, p.primerNombre as nombre1, p.segundoNombre as nombre2, 
            p.primerApellido as apellido1, p.segundoApellido as apellido2 FROM siblhmantenimientoBundle:BlhDonante p  where p.id not in (select don.id from siblhmantenimientoBundle:BlhHistorialClinico hc 
JOIN hc.idDonante don) and p.idBancoDeLeche = $codigo");
        
       //echo $hisclinico[idDonante];
                
        $donantes_registradas  = $query->getResult();
        //Obtener banco de leche//
              
     
     
        return array(
            'donantes_registradas' =>  $donantes_registradas,  
            'hospital' => $establecimiento,
        );
        
    }
      
    
    
    /**
     * Displays a form to create a new BlhHistorialClinico entity.
     *
     * @Route("/new/{id}", name="blhhistorialclinico_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT p.id as identificador, p.codigoDonante as codigo_donante, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.primerApellido as apellido1, p.segundoApellido as apellido2 FROM siblhmantenimientoBundle:BlhDonante p  WHERE p.id = $id "); 
        $datos_donantes  = $query->getResult();
     //   $donante = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($id);   
       $donante = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($datos_donantes[0]['identificador']);
     //Obtener banco de leche//
              
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        if (!$datos_donantes) {
            throw $this->createNotFoundException('Unable to find BlhDonante entity');
        }
        
        
        $entity = new BlhHistorialClinico();
         $entity->setIdDonante($donante);
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'datos_donantes' =>  $datos_donantes, 
            'hospital' => $establecimiento,
        );
    }

    
    
}