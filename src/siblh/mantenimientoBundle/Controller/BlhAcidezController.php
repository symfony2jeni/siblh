<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhAcidez;
use siblh\mantenimientoBundle\Form\BlhAcidezType;

/**
 * BlhAcidez controller.
 *
 * @Route("/blhacidez")
 */
class BlhAcidezController extends Controller
{

    /**
     * Lists all BlhAcidez entities.
     *
     * @Route("/", name="blhacidez")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhAcidez')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhAcidez entity.
     *
     * @Route("/", name="blhacidez_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhAcidez:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhAcidez();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhacidez', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhAcidez entity.
    *
    * @param BlhAcidez $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhAcidez $entity)
    {
        $form = $this->createForm(new BlhAcidezType(), $entity, array(
            'action' => $this->generateUrl('blhacidez_create'),
            'method' => 'POST',
        ));

       // $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhAcidez entity.
     *
     * @Route("/new/{id}", name="blhacidez_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
         $query = $em->createQuery("SELECT  f.codigoFrascoRecolectado,f.volumenRecolectado,f.onzRecolectado,d.primerNombre as nombre1,d.segundoNombre as nombre2,d.primerApellido as apellido1,d.segundoApellido as apellido2 FROM siblhmantenimientoBundle:BlhFrascoRecolectado  f JOIN f.idDonante d   WHERE f.id = $id "); 
          $datos_frasco  = $query->getResult();
        
         $frasco = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);
         
        $entity = new BlhAcidez();
         $entity->setidFrascoRecolectado($frasco);
        $form   = $this->createCreateForm($entity);

        return array(
             'datos_frasco'  => $datos_frasco,
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }


    /**
     * Finds and displays a BlhAcidez entity.
     *
     * @Route("/{id}", name="blhacidez_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAcidez')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAcidez entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhAcidez entity.
     *
     * @Route("/{id}/edit", name="blhacidez_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAcidez')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAcidez entity.');
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
    * Creates a form to edit a BlhAcidez entity.
    *
    * @param BlhAcidez $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhAcidez $entity)
    {
        $form = $this->createForm(new BlhAcidezType(), $entity, array(
            'action' => $this->generateUrl('blhacidez_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

       // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhAcidez entity.
     *
     * @Route("/{id}", name="blhacidez_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhAcidez:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAcidez')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAcidez entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhacidez_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhAcidez entity.
     *
     * @Route("/{id}", name="blhacidez_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhAcidez')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhAcidez entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhacidez'));
    }

    /**
     * Creates a form to delete a BlhAcidez entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhacidez_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
