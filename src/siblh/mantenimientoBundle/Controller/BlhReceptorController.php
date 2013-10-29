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

        return array(
            'entities' => $entities,
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
       // $entity1 = new BlhIngresoReceptor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhreceptor', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
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

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhReceptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
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

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhReceptor entity.');
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

        $form->add('submit', 'submit', array('label' => 'Update'));

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
        
        //Obteniendo lista de pacientes"  
        $query = $em->createQuery("SELECT p.id as identificador, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.tercerNombre as nombre3, p.primerApellido as apellido1, p.segundoApellido as apellido2 FROM siblhmantenimientoBundle:MntPaciente p");
        
       //echo $hisclinico[idDonante];
                
        $pacientes_registrados  = $query->getResult();
        
        return array(
            'pacientes_registrados' =>  $pacientes_registrados,  
         
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
       
        
        
        $entity = new BlhReceptor();
      //   $entity1 = new BlhIngresoReceptor();
         $entity->setIdPaciente($paciente);
        $form   = $this->createCreateForm($entity);
      //  $form1   = $this->createCreateForm1($entity1);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
         //   'entity1' => $entity1,
         //   'form1'   => $form1->createView(),
            'datos_pacientes' =>  $datos_pacientes, 
            'sexo' => $sexo,
            'numexp' => $numexp,
        );
    }
   
}
