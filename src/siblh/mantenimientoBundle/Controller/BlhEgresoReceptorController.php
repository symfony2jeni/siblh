<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhEgresoReceptor;
use siblh\mantenimientoBundle\Form\BlhEgresoReceptorType;

/**
 * BlhEgresoReceptor controller.
 *
 * @Route("/blhegresoreceptor")
 */
class BlhEgresoReceptorController extends Controller
{

    /**
     * Lists all BlhEgresoReceptor entities.
     *
     * @Route("/", name="blhegresoreceptor")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhEgresoReceptor')->findAll();
        //Obtener banco de leche//
              
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $queryb->getResult(); 
        $codigo=$id_blh[0]['id']; 
        
         $query = $em->createQuery("SELECT er.id, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.tercerNombre as nombre3, 
            p.primerApellido as apellido1, p.segundoApellido as apellido2,
            r.codigoReceptor, er.diagnosticoEgreso, er.madreCanguro, er.tipoEgreso, er.comentarioEgreso,
            er.trasladoPeriferico, er.permanenciaUcin, er.hospitalSeguimientoEgreso, er.fechaEgreso,
            er.estanciaHospitalaria
       FROM siblhmantenimientoBundle:BlhEgresoReceptor er join er.idReceptor r join r.idPaciente p where 
       r.idBancoDeLeche = $codigo");
       $egreso_receptores  = $query->getResult(); 
        
        
        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
            'egreso_receptores' => $egreso_receptores
        );
    }
    /**
     * Creates a new BlhEgresoReceptor entity.
     *
     * @Route("/", name="blhegresoreceptor_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhEgresoReceptor:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhEgresoReceptor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
            $entity->setUsuario($usuario);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhegresoreceptor_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhEgresoReceptor entity.
    *
    * @param BlhEgresoReceptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhEgresoReceptor $entity)
    {
        $form = $this->createForm(new BlhEgresoReceptorType(), $entity, array(
            'action' => $this->generateUrl('blhegresoreceptor_create'),
            'method' => 'POST',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    

    /**
     * Finds and displays a BlhEgresoReceptor entity.
     *
     * @Route("/{id}", name="blhegresoreceptor_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
         $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
     
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhEgresoReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhEgresoReceptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
             'hospital' => $establecimiento,
        );
    }

    /**
     * Displays a form to edit an existing BlhEgresoReceptor entity.
     *
     * @Route("/{id}/edit", name="blhegresoreceptor_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhEgresoReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhEgresoReceptor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        //Obtener banco de leche//
              
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'hospital' => $establecimiento,
        );
    }

    /**
    * Creates a form to edit a BlhEgresoReceptor entity.
    *
    * @param BlhEgresoReceptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhEgresoReceptor $entity)
    {
        $form = $this->createForm(new BlhEgresoReceptorType(), $entity, array(
            'action' => $this->generateUrl('blhegresoreceptor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

    //    $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhEgresoReceptor entity.
     *
     * @Route("/{id}", name="blhegresoreceptor_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhEgresoReceptor:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhEgresoReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhEgresoReceptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
            $entity->setUsuario($usuario);
            $em->flush();

            return $this->redirect($this->generateUrl('blhegresoreceptor_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhEgresoReceptor entity.
     *
     * @Route("/{id}", name="blhegresoreceptor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhEgresoReceptor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhEgresoReceptor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhegresoreceptor'));
    }

    /**
     * Creates a form to delete a BlhEgresoReceptor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhegresoreceptor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
//Creando nuevo controlador
    
     //Creando Nuevos Controladores
     
     
    /**
     * Lists all BlhEgresoReceptor entity.
     *
     * @Route("/pacientesreceptores", name="blhegresoreceptor_pacientesreceptores")
     * @Method("GET")
     * @Template()
     */
 
 public function pacientesreceptoresAction()
    {
        $em = $this->getDoctrine()->getManager();   
         //Obtener banco de leche//   
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $queryb->getResult(); 
        $codigo=$id_blh[0]['id']; 
        
        //Obteniendo lista de pacientes"  
        $query = $em->createQuery("SELECT r.id as identificador, r.codigoReceptor, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.tercerNombre as nombre3, p.primerApellido as apellido1, p.segundoApellido as apellido2 
            FROM siblhmantenimientoBundle:BlhReceptor r join r.idPaciente p 
            WHERE r.estadoReceptor = 'Activo' and r.id  not in (select rec.id from siblhmantenimientoBundle:BlhEgresoReceptor e 
JOIN e.idReceptor rec) and r.idBancoDeLeche = $codigo");
        
       //echo $hisclinico[idDonante];
                
        $receptores_registrados  = $query->getResult();
        
        
        return array(
            'receptores_registrados' =>  $receptores_registrados, 
            'hospital' => $establecimiento,
         
        );
        
    }
       
 /**
     * Displays a form to create a new BlhEgresoReceptor entity.
     *
     * @Route("/new/{id}", name="blhegresoreceptor_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT r.id as identificador, r.codigoReceptor,r.fechaRegistroBlh, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.tercerNombre as nombre3, p.primerApellido as apellido1, p.segundoApellido as apellido2, p.direccion, p.fechaNacimiento FROM siblhmantenimientoBundle:BlhReceptor r join r.idPaciente p  WHERE r.id = $id "); 
        $datos_receptores  = $query->getResult();
        $receptor = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($datos_receptores[0]['identificador']);
      
        if (!$datos_receptores) {
            throw $this->createNotFoundException('Unable to find MntPaciente entity');
        }
       
        $entity = new BlhEgresoReceptor();
        $entity->setIdReceptor($receptor );
        $form   = $this->createCreateForm($entity);
           //Obtener banco de leche//
              
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'datos_receptores' =>  $datos_receptores, 
            'hospital' => $establecimiento,
        );
    }   
    
}