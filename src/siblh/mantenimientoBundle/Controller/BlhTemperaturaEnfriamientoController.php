<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhTemperaturaEnfriamiento;
use siblh\mantenimientoBundle\Form\BlhTemperaturaEnfriamientoType;

/**
 * BlhTemperaturaEnfriamiento controller.
 *
 * @Route("/blhtemperaturaenfriamiento")
 */
class BlhTemperaturaEnfriamientoController extends Controller
{

    /**
     * Lists all BlhTemperaturaEnfriamiento entities.
     *
     * @Route("/", name="blhtemperaturaenfriamiento")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaEnfriamiento')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhTemperaturaEnfriamiento entity.
     *
     * @Route("/", name="blhtemperaturaenfriamiento_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhTemperaturaEnfriamiento:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhTemperaturaEnfriamiento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhtemperaturaenfriamiento_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhTemperaturaEnfriamiento entity.
    *
    * @param BlhTemperaturaEnfriamiento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhTemperaturaEnfriamiento $entity)
    {
        $form = $this->createForm(new BlhTemperaturaEnfriamientoType(), $entity, array(
            'action' => $this->generateUrl('blhtemperaturaenfriamiento_create'),
            'method' => 'POST',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

     /**
     * Finds and displays a BlhTemperaturaEnfriamiento entity.
     *
     * @Route("/{id}", name="blhtemperaturaenfriamiento_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaEnfriamiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhTemperaturaEnfriamiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhTemperaturaEnfriamiento entity.
     *
     * @Route("/{id}/edit", name="blhtemperaturaenfriamiento_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaEnfriamiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhTemperaturaEnfriamiento entity.');
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
    * Creates a form to edit a BlhTemperaturaEnfriamiento entity.
    *
    * @param BlhTemperaturaEnfriamiento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhTemperaturaEnfriamiento $entity)
    {
        $form = $this->createForm(new BlhTemperaturaEnfriamientoType(), $entity, array(
            'action' => $this->generateUrl('blhtemperaturaenfriamiento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhTemperaturaEnfriamiento entity.
     *
     * @Route("/{id}", name="blhtemperaturaenfriamiento_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhTemperaturaEnfriamiento:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaEnfriamiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhTemperaturaEnfriamiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhtemperaturaenfriamiento_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhTemperaturaEnfriamiento entity.
     *
     * @Route("/{id}", name="blhtemperaturaenfriamiento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaEnfriamiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhTemperaturaEnfriamiento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhtemperaturaenfriamiento'));
    }

    /**
     * Creates a form to delete a BlhTemperaturaEnfriamiento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhtemperaturaenfriamiento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    //Creando nuevo controlador
    
     //Creando Nuevos Controladores
     
     
    /**
     * Lists all BlhTemperaturaEnfriamiento entity.
     *
     * @Route("/pasteurizacion", name="blhtemperaturaenfriamiento_pasteurizacion")
     * @Method("GET")
     * @Template()
     */
public function pasteurizacionAction()
    {
        $em = $this->getDoctrine()->getManager();      
        
        //Obteniendo lista de pacientes"  
        $query = $em->createQuery("SELECT r.id as identificador, r.codigoPasteurizacion, r.numCiclo, r.volumenPasteurizado, r.numFrascosPasteurizados, r.fechaPasteurizacion FROM siblhmantenimientoBundle:BlhPasteurizacion r");
        
       //echo $hisclinico[idDonante];
                
        $pasteurizaciones  = $query->getResult();
        
        return array(
            'pasteurizaciones' =>  $pasteurizaciones,  
         
        );
        
    }
   

/**
     * Displays a form to create a new BlhTemperaturaEnfriamiento entity.
     *
     * @Route("/new/{id}", name="blhtemperaturaenfriamiento_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        
         $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT r.id as identificador, r.codigoPasteurizacion, r.numCiclo, r.volumenPasteurizado, r.numFrascosPasteurizados, r.fechaPasteurizacion FROM siblhmantenimientoBundle:BlhPasteurizacion r WHERE r.id = $id "); 
        $datos_pasteurizacion  = $query->getResult();
 $query2 = $em->createQuery("SELECT r.temperaturaE FROM siblhmantenimientoBundle:BlhTemperaturaEnfriamiento r  join r.idPasteurizacion p WHERE p.id = $id "); 
        $temperaturas  = $query2->getResult();

         $pasteurizacion = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->find($datos_pasteurizacion[0]['identificador']);
      
        if (!$datos_pasteurizacion) {
            throw $this->createNotFoundException('Unable to find MntPaciente entity');
        }
       
       
        
        $entity = new BlhTemperaturaEnfriamiento();
         $entity->setIdPasteurizacion($pasteurizacion );
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'datos_pasteurizacion' =>  $datos_pasteurizacion, 
            'temperaturas' =>  $temperaturas, 
        );
    }    
}
