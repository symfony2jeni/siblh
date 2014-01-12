<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhReceptor;
use siblh\mantenimientoBundle\Form\BlhReceptorType;
//use siblh\mantenimientoBundle\Entity\BlhIngresoReceptor;
use siblh\mantenimientoBundle\Form\BlhIngresoReceptorType;

/**
 * BlhReceptor controller.
 *
 * @Route("/blhreceptor")
 */
class BlhReceptorController extends Controller
{

    /**
     * Lists all BlhReceptor entities.
     *
     * @Route("/", name="blhreceptor")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->findAll();
      
         //Obtener banco de leche//              
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 
       $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
       $id_blh = $queryb->getResult(); 
       $codigo=$id_blh[0]['id']; 
       $query = $em->createQuery("SELECT r.id, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.tercerNombre as nombre3, 
            p.primerApellido as apellido1, p.segundoApellido as apellido2,
            r.codigoReceptor, r.fechaRegistroBlh, r.procedencia, r.estadoReceptor,
            r.edadDias, r.pesoReceptor, r.duracionCpap, r.clasificacionLubchengo,
            r.diagnosticoIngreso, r.duracionNpt, r.apgarPrimerMinuto, r.edadGestFur, r.duracionVentilacion,
            r.edadGestBallard, r.pc, r.tallaIngreso
       FROM siblhmantenimientoBundle:BlhReceptor r join r.idPaciente p where 
       r.idBancoDeLeche = $codigo");
       $receptores_registrados  = $query->getResult(); 
        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
            'receptores_registrados' => $receptores_registrados
            );
    }
    /**
     * Creates a new BlhReceptor entity.
     *
     * @Route("/", name="blhreceptor_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhReceptor:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhReceptor();
		$usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity->setUsuario($usuario);
       // $entity1 = new BlhIngresoReceptor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
//Obtener banco de leche//
        $em = $this->getDoctrine()->getManager();     
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
  /*      $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query2->getResult(); 
        $codigo=$id_blh[0]['id']; 
        echo $codigo;
        $blh = $em->getRepository('siblhmantenimientoBundle:BlhBancoDeLeche')->find($codigo);
      */
        
        if ($form->isValid()) {
            $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity->setUsuario($usuario);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
        /*    $idnuevoreceptor = $entity->getId();
            $receptor = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($idnuevoreceptor);
            $receptor->setIdBancoDeLeche($blh);
              $em->persist($entity);
            $em->flush();*/
            return $this->redirect($this->generateUrl('blhreceptor_show', array('id' => $entity->getId())));
        }
 
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'hospital' => $establecimiento,
                    
        );
        
        
        
    }

    /**
    * Creates a form to create a BlhReceptor entity.
    *
    * @param BlhReceptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhReceptor $entity)
    {
        $form = $this->createForm(new BlhReceptorType(), $entity, array(
            'action' => $this->generateUrl('blhreceptor_create'),
            'method' => 'POST',
        ));

     //   $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
    
    
    private function createCreateForm1(BlhIngresoReceptor $entity1)
    {
           $form1 = $this->createForm(new BlhIngresoReceptorType(), $entity1, array(
            'action' => $this->generateUrl('blhingresoreceptor_create'),
            'method' => 'POST',
        ));
           
                 return $form1;
    }

     /**
     * Finds and displays a BlhReceptor entity.
     *
     * @Route("/{id}", name="blhreceptor_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 


        $entity = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhReceptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'hospital' => $establecimiento,
        );
    }

    /**
     * Displays a form to edit an existing BlhReceptor entity.
     *
     * @Route("/{id}/edit", name="blhreceptor_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
	   $user_ID = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhReceptor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
         //Obtener banco de leche//
              
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
     
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'hospital' => $establecimiento,
			'user_ID' => $user_ID,
        );
    }

    /**
    * Creates a form to edit a BlhReceptor entity.
    *
    * @param BlhReceptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhReceptor $entity)
    {
        $form = $this->createForm(new BlhReceptorType(), $entity, array(
            'action' => $this->generateUrl('blhreceptor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhReceptor entity.
     *
     * @Route("/{id}", name="blhreceptor_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhReceptor:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($id);
		$usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity->setUsuario($usuario);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhReceptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhreceptor_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhReceptor entity.
     *
     * @Route("/{id}", name="blhreceptor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhReceptor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhreceptor'));
    }

    /**
     * Creates a form to delete a BlhReceptor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhreceptor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    
    
//Creando nuevo controlador
    
     //Creando Nuevos Controladores
     
     
    /**
     * Lists all BlhReceptor entity.
     *
     * @Route("/pacientes", name="blhreceptor_pacientes")
     * @Method("GET")
     * @Template()
     */
 
 public function pacientesAction()
    {
        $em = $this->getDoctrine()->getManager();          
       
                //Obtener banco de leche//
              
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        
         //Obteniendo lista de pacientes"  
        $query = $em->createQuery("SELECT p.id as identificador, p.primerNombre as nombre1, p.segundoNombre as nombre2, 
            p.tercerNombre as nombre3, p.primerApellido as apellido1, p.segundoApellido as apellido2 
            FROM siblhmantenimientoBundle:MntExpediente e  join e.idPaciente p
            where e.idEstablecimiento =  $userEst and (p.fechaNacimiento between DATE_SUB(CURRENT_DATE(), 6, 'MONTH') and CURRENT_DATE()) and
            p.id not in (select pac.id from siblhmantenimientoBundle:BlhReceptor r JOIN r.idPaciente pac)");  
        
        $pacientes_registrados  = $query->getResult();
        return array(
            'pacientes_registrados' =>  $pacientes_registrados, 
             'hospital' => $establecimiento,
         
        );
        
    }
    
    
  /**
     * Displays a form to create a new BlhReceptor entity.
     *
     * @Route("/new/{id}", name="blhreceptor_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
	   $user_ID = $this->container->get('security.context')->getToken()->getUser()->getId();        
        $query = $em->createQuery("SELECT p.id as identificador, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.tercerNombre as nombre3, p.primerApellido as apellido1, p.segundoApellido as apellido2, p.direccion, p.fechaNacimiento FROM siblhmantenimientoBundle:MntPaciente p  WHERE p.id = $id "); 
        $datos_pacientes  = $query->getResult();
     //   $donante = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($id);   
        $paciente = $em->getRepository('siblhmantenimientoBundle:MntPaciente')->find($datos_pacientes[0]['identificador']);
        $query2 = $em->createQuery("SELECT e.nombre, p.id FROM siblhmantenimientoBundle:MntPaciente p  join p.idSexo e WHERE p.id = $id "); 
        $sexo  = $query2->getResult();

        $query3 = $em->createQuery("SELECT p.numero, p.id FROM siblhmantenimientoBundle:MntExpediente p  join p.idPaciente e WHERE e.id = $id "); 
        $numexp  = $query3->getResult();
   
        
        if (!$datos_pacientes) {
            throw $this->createNotFoundException('Unable to find MntPaciente entity');
        }
         
        //Obtener banco de leche//
              
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        $queryi = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
       $id_blh = $queryi->getResult(); 
       $codigo=$id_blh[0]['id']; 
       
       $blh = $em->getRepository('siblhmantenimientoBundle:BlhBancoDeLeche')->find($codigo);
       
        $entity = new BlhReceptor();
        $entity->setIdBancoDeLeche($blh);
        $entity->setIdPaciente($paciente);
        $form   = $this->createCreateForm($entity);
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'datos_pacientes' =>  $datos_pacientes, 
            'sexo' => $sexo,
            'numexp' => $numexp,
            'hospital' => $establecimiento,
			'user_ID' => $user_ID,
        );
    }
    

    
        
    /**
     * Lists all BlhReceptor entity.
     *
     * @Route("/listado/reportes/receptores", name="reportes_receptores")
     * @Method("GET")
     * @Template()
     */
 
 public function listadoReportesReceptoresAction()
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
     * @Route("/avance/receptor",name="AvanceReceptor")
     * @Method("GET") 
     * @Template()
     */
    
 
 public function AvanceReceptorAction()
    {
        $em = $this->getDoctrine()->getManager();      
        
        //Obteniendo lista de pacientes"  
        $query = $em->createQuery("SELECT r.id as identificador, p.primerNombre as nombre1, p.segundoNombre as nombre2, 
            p.tercerNombre as nombre3, p.primerApellido as apellido1, p.segundoApellido as apellido2,  r.codigoReceptor
            FROM siblhmantenimientoBundle:BlhReceptor r join r.idPaciente p where r.estadoReceptor = 'Activo'
            and r.id in (select rec.id from siblhmantenimientoBundle:BlhSeguimientoReceptor sr 
JOIN sr.idReceptor rec)");  
         
        $receptores_registrados  = $query->getResult();
           //Obtener banco de leche//
              
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 
       $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
       $id_blh = $query2->getResult(); 
       $codigo=$id_blh[0]['id']; 
      $nombre=$establecimiento[0]['nombre']; 
        return array(
            'receptores_registrados' =>  $receptores_registrados,  
            'hospital' => $establecimiento,
            'codigo' => $codigo,
            'nombre' => $nombre    
         
        );
        
    }   
//para salida leche despachada por receptor//
        /**
     * @Route("/leche/receptor",name="LecheReceptor")
     * @Method("GET") 
     * @Template()
     */
    
 
 public function LecheReceptorAction()
    {
        $em = $this->getDoctrine()->getManager();      
        
        //Obteniendo lista de pacientes"  
        $query = $em->createQuery("SELECT r.id as identificador, p.primerNombre as nombre1, p.segundoNombre as nombre2, 
            p.tercerNombre as nombre3, p.primerApellido as apellido1, p.segundoApellido as apellido2,  r.codigoReceptor
            FROM siblhmantenimientoBundle:BlhReceptor r join r.idPaciente p where r.estadoReceptor = 'Activo'
            and r.id in (select rec.id from siblhmantenimientoBundle:BlhSeguimientoReceptor sr 
JOIN sr.idReceptor rec)");  
         
        $receptores_registrados  = $query->getResult();
           //Obtener banco de leche//
              
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 
       $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
       $id_blh = $query2->getResult(); 
       $codigo=$id_blh[0]['id']; 
      $nombre=$establecimiento[0]['nombre']; 
        return array(
            'receptores_registrados' =>  $receptores_registrados,  
            'hospital' => $establecimiento,
            'codigo' => $codigo,
            'nombre' => $nombre    
         
        );
        
    }   

    
     /** Lists all BlhReceptor entity.
     *
     * @Route("/listado/mantenimiento/receptor", name="mantenimiento_receptor")
     * @Method("GET")
     * @Template()
     */
 
 public function mantenimientoReceptorAction()
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
   
}
