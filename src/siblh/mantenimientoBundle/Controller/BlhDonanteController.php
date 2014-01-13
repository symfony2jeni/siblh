<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhDonante;
use siblh\mantenimientoBundle\Form\BlhDonanteType;

/**
 * BlhDonante controller.
 *
 * @Route("/blhdonante")
 */
class BlhDonanteController extends Controller
{

    /**
     * Lists all BlhDonante entities.
     *
     * @Route("/", name="blhdonante")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->findAll();
     //Obtener banco de leche//            
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();      
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $queryb->getResult(); 
        $codigo=$id_blh[0]['id']; 
        if ($codigo<10){
        $idp='0'.$codigo;
        $idp = (string)$idp;
         }
      else{$idp = (string)$codigo;}
     //   echo $establecimiento [0]['nombre'];
      
      $query = $em->createQuery("SELECT d.id, d.codigoDonante, d.primerNombre, d.segundoNombre,
          d.primerApellido, d.segundoApellido,
           d.fechaNacimiento, d.fechaRegistroDonanteBlh, d.telefonoFijo, d.telefonoMovil,
           d.direccion, d.procedencia, d.registro, d.documentoIdentificacion, d.numeroDocumentoIdentificacion,
           d.edad, d.ocupacion, d.estadoCivil, d.nacionalidad, d.escolaridad, d.tipoColecta, d.observaciones
       FROM siblhmantenimientoBundle:BlhDonante d where 
       d.idBancoDeLeche = $codigo order by d.codigoDonante");
       $donante  = $query->getResult(); 
        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
            'donante' => $donante,
        );
    }
    /**
     * Creates a new BlhDonante entity.
     *
     * @Route("/", name="blhdonante_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhDonante:new.html.twig")
     */
    public function createAction(Request $request)
    {
        
        $entity = new BlhDonante();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

       if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhdonante_show', array('id' => $entity->getId())));

      }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ); 
    }

    /**
    * Creates a form to create a BlhDonante entity.
    *
    * @param BlhDonante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhDonante $entity)
    {
        $form = $this->createForm(new BlhDonanteType(), $entity, array(
            'action' => $this->generateUrl('blhdonante_create'),
            'method' => 'POST',
        ));

    //    $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhDonante entity.
     *
     * @Route("/new", name="blhdonante_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        //Obtener banco de leche//
      $em = $this->getDoctrine()->getManager();          
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();       
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      $queryi = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $queryi->getResult(); 
      $codigo=$id_blh[0]['id']; 
      $blh = $em->getRepository('siblhmantenimientoBundle:BlhBancoDeLeche')->find($codigo);
       
        $entity = new BlhDonante();
        $entity->setIdBancoDeLeche($blh);
        $form = $this->createCreateForm($entity);
  
        return array(
          'entity' => $entity,
          'form'   => $form->createView(),
          'hospital' => $establecimiento,
        );
    }

    /**
     * Finds and displays a BlhDonante entity.
     *
     * @Route("/{id}", name="blhdonante_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        //Obtener banco de leche//            
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();      
      //  $codigo=$id_blh[0]['id'];        
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhDonante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
      //   $entity->setIdDonante($donante);

        return array(
           'entity'      => $entity,
           'delete_form' => $deleteForm->createView(),
           'hospital' => $establecimiento,
         
        );
    }

    /**
     * Displays a form to edit an existing BlhDonante entity.
     *
     * @Route("/{id}/edit", name="blhdonante_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($id);
         //Obtener banco de leche//
              
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhDonante entity.');
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
    * Creates a form to edit a BlhDonante entity.
    *
    * @param BlhDonante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhDonante $entity)
    {
        $form = $this->createForm(new BlhDonanteType(), $entity, array(
            'action' => $this->generateUrl('blhdonante_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));
        
        

      //  $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhDonante entity.
     *
     * @Route("/{id}", name="blhdonante_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhDonante:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhDonante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhdonante_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhDonante entity.
     *
     * @Route("/{id}", name="blhdonante_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhDonante entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhdonante'));
    }

    /**
     * Creates a form to delete a BlhDonante entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhdonante_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;

    }
    

     
     
     
    /**
     * Lists all BlhReceptor entity.
     *
     * @Route("/listado/reportes/donantes", name="reportes_donantes")
     * @Method("GET")
     * @Template()
     */
 
 public function listadoReportesDonantesAction()
    {
      
     $em = $this->getDoctrine()->getManager();   
      //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
           
         return array(
            'hospital' => $establecimiento,
        );
           
     
     
        
    }
    
      /**
     * Lists all BlhReceptor entity.
     *
     * @Route("/listado/mantenimiento/donantes", name="mantenimiento_donantes")
     * @Method("GET")
     * @Template()
     */
 
 public function mantenimientoDonanteAction()
    {
      
     $em = $this->getDoctrine()->getManager();   
      //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
           
         return array(
            'hospital' => $establecimiento,
        );
           
     
     
        
    }
    

        /**
     * @Route("/leche/donante",name="LecheDonante")
     * @Method("GET") 
     * @Template()
     */
    
 
 public function LecheDonanteAction()
    {
        $em = $this->getDoctrine()->getManager();      
        
        //Obteniendo lista de pacientes"  
        $query = $em->createQuery("SELECT d.id as identificador, d.primerNombre as nombre1, d.segundoNombre as nombre2, 
            d.primerApellido as apellido1, d.segundoApellido as apellido2,  d.codigoDonante
            FROM siblhmantenimientoBundle:BlhDonante d where d.estado = 'Activa'
            and  (d.id in (select don.id from siblhmantenimientoBundle:BlhHistorialClinico hc 
JOIN hc.idDonante don)) and (d.id in (select donan.id from siblhmantenimientoBundle:BlhHistoriaActual ha 
JOIN ha.idDonante donan))");  
         
        $donantes  = $query->getResult();
           //Obtener banco de leche//
              
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 
       $query2 = $em->createQuery("SELECT b.id as id2 FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
       $id_blh = $query2->getResult(); 
       
      $id2=$id_blh[0]['id2']; 
       
       
  
      $nombre=$establecimiento[0]['nombre']; 
        return array(
            'donantes' =>  $donantes,  
            'hospital' => $establecimiento,
            'id2' => $id2,
            'nombre' => $nombre    
         
        );
        
    }   

 /**
     * @Route("/informacion/donante",name="InfoDonante")
     * @Method("GET") 
     * @Template()
     */
    
 
 public function InfoDonanteAction()
    {
        $em = $this->getDoctrine()->getManager();      
        
        //Obteniendo lista de pacientes"  
        $query = $em->createQuery("SELECT d.id as identificador, d.primerNombre as nombre1, d.segundoNombre as nombre2, 
            d.primerApellido as apellido1, d.segundoApellido as apellido2,  d.codigoDonante
            FROM siblhmantenimientoBundle:BlhDonante d where d.estado = 'Activa'
            and  (d.id in (select don.id from siblhmantenimientoBundle:BlhHistorialClinico hc 
JOIN hc.idDonante don)) and (d.id in (select donan.id from siblhmantenimientoBundle:BlhHistoriaActual ha 
JOIN ha.idDonante donan))");  
         
        $donantes  = $query->getResult();
           //Obtener banco de leche//
              
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 
       $query2 = $em->createQuery("SELECT b.id as id2 FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
       $id_blh = $query2->getResult(); 
       
      $id2=$id_blh[0]['id2']; 
       
       
  
      $nombre=$establecimiento[0]['nombre']; 
        return array(
            'donantes' =>  $donantes,  
            'hospital' => $establecimiento,
            'id2' => $id2,
            'nombre' => $nombre    
         
        );
        
    }   

    /**
     * @Route("/donaciones/donante",name="donaciones_Donante")
     * @Method("GET") 
     * @Template()
     */
    
 
 public function donaciones_DonanteAction()
    {
        $em = $this->getDoctrine()->getManager();      
        
        //Obteniendo lista de pacientes"  
        $query = $em->createQuery("SELECT d.id as identificador, d.primerNombre as nombre1, d.segundoNombre as nombre2, 
            d.primerApellido as apellido1, d.segundoApellido as apellido2,  d.codigoDonante
            FROM siblhmantenimientoBundle:BlhDonante d where d.estado = 'Activa'
            and  (d.id in (select don.id from siblhmantenimientoBundle:BlhHistorialClinico hc 
JOIN hc.idDonante don)) and (d.id in (select donan.id from siblhmantenimientoBundle:BlhHistoriaActual ha 
JOIN ha.idDonante donan))");  
         
        $donantes  = $query->getResult();
           //Obtener banco de leche//
              
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 
       $query2 = $em->createQuery("SELECT b.id as id2 FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
       $id_blh = $query2->getResult(); 
       
      $id2=$id_blh[0]['id2']; 
       
       
  
      $nombre=$establecimiento[0]['nombre']; 
        return array(
            'donantes' =>  $donantes,  
            'hospital' => $establecimiento,
            'id2' => $id2,
            'nombre' => $nombre    
         
        );
        
    } 
    }    
