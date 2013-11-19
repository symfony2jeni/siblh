<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhFrascoRecolectado;
use siblh\mantenimientoBundle\Form\BlhFrascoRecolectadoType;

/**
 * BlhFrascoRecolectado controller.
 *
 * @Route("/blhfrascorecolectado")
 */
class BlhFrascoRecolectadoController extends Controller
{

    /**
     * Lists all BlhFrascoRecolectado entities.
     *
     * @Route("/", name="blhfrascorecolectado")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhFrascoRecolectado entity.
     *
     * @Route("/", name="blhfrascorecolectado_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhFrascoRecolectado:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhFrascoRecolectado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascorecolectado', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhFrascoRecolectado entity.
    *
    * @param BlhFrascoRecolectado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhFrascoRecolectado $entity)
    {
        $form = $this->createForm(new BlhFrascoRecolectadoType(), $entity, array(
            'action' => $this->generateUrl('blhfrascorecolectado_create'),
            'method' => 'POST',
        ));

   //     $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhFrascoRecolectado entity.
     *
     * @Route("/new", name="blhfrascorecolectado_new")
     * @Method("GET")
     * @Template()
     */
  /*  public function newAction()
    {
        $entity = new BlhFrascoRecolectado();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    } */
    
    
    

    /**
     * Finds and displays a BlhFrascoRecolectado entity.
     *
     * @Route("/{id}", name="blhfrascorecolectado_show")
     * @Method("GET")
     * @Template()
     */
   public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoRecolectado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhFrascoRecolectado entity.
     *
     * @Route("/{id}/edit", name="blhfrascorecolectado_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoRecolectado entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a BlhFrascoRecolectado entity.
    *
    * @param BlhFrascoRecolectado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhFrascoRecolectado $entity)
    {
        $form = $this->createForm(new BlhFrascoRecolectadoType(), $entity, array(
            'action' => $this->generateUrl('blhfrascorecolectado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhFrascoRecolectado entity.
     *
     * @Route("/{id}", name="blhfrascorecolectado_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhFrascoRecolectado:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoRecolectado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascorecolectado_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhFrascoRecolectado entity.
     *
     * @Route("/{id}", name="blhfrascorecolectado_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhFrascoRecolectado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhfrascorecolectado'));
    }

    /**
     * Creates a form to delete a BlhFrascoRecolectado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhfrascorecolectado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    //Creando nuevo controlador
    
     //Creando Nuevos Controladores
     
     
    /**
     * Lists all BlhFrascoRecolectado entities.
     *
     * @Route("/donaciones", name="blhfrascorecolectado_donaciones")
     * @Method("GET")
     * @Template()
     */
 
 public function donacionesAction()
    {
        $em = $this->getDoctrine()->getManager();      
        
        //Obteniendo lista de pacientes que son receptores y que estan en estado "Activo"  
        $query = $em->createQuery("SELECT r.id, r.fechaDonacion, r.responsableDonacion, p.id as identificador, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.primerApellido as apellido1, p.segundoApellido as apellido2 FROM siblhmantenimientoBundle:BlhDonacion r JOIN r.idDonante p");
        
        $donaciones_donantes  = $query->getResult();
        
        return array(
            'donaciones_donantes' =>  $donaciones_donantes        
        );
        
    }
    
    
     /**
     * Displays a form to create a new BlhFrascoRecolectado entity.
     *
     * @Route("/new/{id}", name="blhfrascorecolectado_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
         $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery("SELECT r.id, r.fechaDonacion, r.responsableDonacion, p.id as identificador, p.codigoDonante as codigo_donante, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.primerApellido as apellido1, p.segundoApellido as apellido2 FROM siblhmantenimientoBundle:BlhDonacion r JOIN r.idDonante p  WHERE r.id = $id "); 
        $datos_donacion  = $query->getResult();
        $donacion = $em->getRepository('siblhmantenimientoBundle:BlhDonacion')->find($id);   
       
        $query2 = $em->createQuery("SELECT e.id FROM siblhmantenimientoBundle:BlhEstado e WHERE e.nombreEstado = 'Prealmacenado' "); 
        $estado  = $query2->getResult();
     //  echo $iddonante[0]['idDonante']; 
     
      $donante = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($datos_donacion[0]['identificador']);
      $estadof = $em->getRepository('siblhmantenimientoBundle:BlhEstado')->find($estado[0]['id']);
     
     //  echo $datos_donacion[0]['id'];
       
        if (!$datos_donacion) {
            throw $this->createNotFoundException('Unable to find BlhDonante entity');
        }
        
        
        
        $entity = new BlhFrascoRecolectado();
        $entity->setIdDonacion($donacion);
        $entity->setIdDonante($donante);
        $entity->setIdEstado($estadof);
        $form   = $this->createCreateForm($entity);

        
        
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
             'datos_donacion' =>  $datos_donacion,  
        );
    }
    

     
    
      /**
     * Lists all BlhReceptor entity.
     *
     * @Route("/listado/reportes/laboratorio", name="reportes_laboratorio")
     * @Method("GET")
     * @Template()
     */
 
 public function listadoReportesLaboratorioAction()
    {

        
        return array();
        
    }
}
