<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhRol;
use siblh\mantenimientoBundle\Form\BlhRolType;

/**
 * BlhRol controller.
 *
 * @Route("/blhrol")
 */
class BlhRolController extends Controller
{

    /**
     * Lists all BlhRol entities.
     *
     * @Route("/", name="blhrol")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhRol')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhRol entity.
     *
     * @Route("/", name="blhrol_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhRol:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhRol();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhrol_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhRol entity.
    *
    * @param BlhRol $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhRol $entity)
    {
        $form = $this->createForm(new BlhRolType(), $entity, array(
            'action' => $this->generateUrl('blhrol_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhRol entity.
     *
     * @Route("/new", name="blhrol_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhRol();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhRol entity.
     *
     * @Route("/{id}", name="blhrol_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhRol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhRol entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhRol entity.
     *
     * @Route("/{id}/edit", name="blhrol_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhRol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhRol entity.');
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
    * Creates a form to edit a BlhRol entity.
    *
    * @param BlhRol $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhRol $entity)
    {
        $form = $this->createForm(new BlhRolType(), $entity, array(
            'action' => $this->generateUrl('blhrol_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhRol entity.
     *
     * @Route("/{id}", name="blhrol_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhRol:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhRol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhRol entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhrol_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhRol entity.
     *
     * @Route("/{id}", name="blhrol_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhRol')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhRol entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhrol'));
    }

    /**
     * Creates a form to delete a BlhRol entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhrol_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}