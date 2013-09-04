<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhSolicitud;
use siblh\mantenimientoBundle\Form\BlhSolicitudType;

/**
 * BlhSolicitud controller.
 *
 * @Route("/blhsolicitud")
 */
class BlhSolicitudController extends Controller
{

    /**
     * Lists all BlhSolicitud entities.
     *
     * @Route("/", name="blhsolicitud")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhSolicitud')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhSolicitud entity.
     *
     * @Route("/", name="blhsolicitud_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhSolicitud:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhSolicitud();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhsolicitud_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhSolicitud entity.
    *
    * @param BlhSolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhSolicitud $entity)
    {
        $form = $this->createForm(new BlhSolicitudType(), $entity, array(
            'action' => $this->generateUrl('blhsolicitud_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhSolicitud entity.
     *
     * @Route("/new", name="blhsolicitud_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhSolicitud();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhSolicitud entity.
     *
     * @Route("/{id}", name="blhsolicitud_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhSolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhSolicitud entity.
     *
     * @Route("/{id}/edit", name="blhsolicitud_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhSolicitud entity.');
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
    * Creates a form to edit a BlhSolicitud entity.
    *
    * @param BlhSolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhSolicitud $entity)
    {
        $form = $this->createForm(new BlhSolicitudType(), $entity, array(
            'action' => $this->generateUrl('blhsolicitud_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhSolicitud entity.
     *
     * @Route("/{id}", name="blhsolicitud_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhSolicitud:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhSolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhsolicitud_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhSolicitud entity.
     *
     * @Route("/{id}", name="blhsolicitud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhSolicitud')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhSolicitud entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhsolicitud'));
    }

    /**
     * Creates a form to delete a BlhSolicitud entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhsolicitud_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
