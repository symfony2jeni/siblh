<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhSeguimientoReceptor;
use siblh\mantenimientoBundle\Form\BlhSeguimientoReceptorType;

use siblh\mantenimientoBundle\Entity\BlhReceptor;
/**
 * BlhSeguimientoReceptor controller.
 *
 * @Route("/blhseguimientoreceptor")
 */
class BlhSeguimientoReceptorController extends Controller
{

    /**
     * Lists all BlhSeguimientoReceptor entities.
     *
     * @Route("/", name="blhseguimientoreceptor")
     * @Method("GET")
     * @Template()
     */
   public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhSeguimientoReceptor')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhSeguimientoReceptor entity.
     *
     * @Route("/", name="blhseguimientoreceptor_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhSeguimientoReceptor:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhSeguimientoReceptor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhseguimientoreceptor_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhSeguimientoReceptor entity.
    *
    * @param BlhSeguimientoReceptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhSeguimientoReceptor $entity)
    {
        $form = $this->createForm(new BlhSeguimientoReceptorType(), $entity, array(
            'action' => $this->generateUrl('blhseguimientoreceptor_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhSeguimientoReceptor entity.
     *
     * @Route("/new", name="blhseguimientoreceptor_new")
     * @Method("GET")
     * @Template()
     */
    /*public function newAction()
    {
        $entity = new BlhSeguimientoReceptor();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }*/

    /**
     * Finds and displays a BlhSeguimientoReceptor entity.
     *
     * @Route("/{id}", name="blhseguimientoreceptor_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhSeguimientoReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhSeguimientoReceptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhSeguimientoReceptor entity.
     *
     * @Route("/{id}/edit", name="blhseguimientoreceptor_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhSeguimientoReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhSeguimientoReceptor entity.');
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
    * Creates a form to edit a BlhSeguimientoReceptor entity.
    *
    * @param BlhSeguimientoReceptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhSeguimientoReceptor $entity)
    {
        $form = $this->createForm(new BlhSeguimientoReceptorType(), $entity, array(
            'action' => $this->generateUrl('blhseguimientoreceptor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhSeguimientoReceptor entity.
     *
     * @Route("/{id}", name="blhseguimientoreceptor_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhSeguimientoReceptor:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhSeguimientoReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhSeguimientoReceptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhseguimientoreceptor_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhSeguimientoReceptor entity.
     *
     * @Route("/{id}", name="blhseguimientoreceptor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhSeguimientoReceptor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhSeguimientoReceptor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhseguimientoreceptor'));
    }

    /**
     * Creates a form to delete a BlhSeguimientoReceptor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhseguimientoreceptor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    /**
     * Lists all BlhSeguimientoReceptor entities.
     *
     * @Route("/receptores/seguimiento", name="blhreceptores_seguimiento")
     * @Method("GET")
     * @Template()
     */
 
 public function receptoresSeguimientoAction()
    {
        $em = $this->getDoctrine()->getManager();      
        
        //Obteniendo lista de pacientes que son receptores y que estan en estado "Activo"  
        $query = $em->createQuery("SELECT r.id, r.codigoReceptor, p.id as identificador, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.tercerNombre as nombre3, p.primerApellido as apellido1, p.segundoApellido as apellido2, s.nombre as sexo FROM siblhmantenimientoBundle:BlhReceptor r JOIN r.idPaciente p JOIN p.idSexo s WHERE r.estadoReceptor = 'Activo'");
        
        $receptores_seguimiento  = $query->getResult();
        
        return array(
            'receptores_seguimiento' => $receptores_seguimiento,         
        );
        
    }
    
      /**
     * Displays a form to create a new BlhSeguimientoReceptor entity.
     *
     * @Route("/new/{id}", name="blhseguimientoreceptor_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        
         //mostrando los datos del receptor seleccionado
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery("SELECT r.id,r.codigoReceptor, p.primerNombre as primer_nombre, p.segundoNombre as segundo_nombre, p.tercerNombre as tercer_nombre, p.primerApellido as primer_apellido, p.segundoApellido as segundo_apellido FROM siblhmantenimientoBundle:BlhReceptor r JOIN r.idPaciente p WHERE r.id = $id "); 
        
        $datos_receptor  = $query->getResult();
        
        $receptor = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($id);
     
        
        if (!$datos_receptor) {
            throw $this->createNotFoundException('Unable to find BlhSolicitud entity.');
        }
        
        
        
        $entity = new BlhSeguimientoReceptor();
        $entity->setidReceptor($receptor);
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'datos_receptor' => $datos_receptor,
        );
    }
    
}