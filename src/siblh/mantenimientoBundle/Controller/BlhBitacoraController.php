<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhBitacora;
use siblh\mantenimientoBundle\Form\BlhBitacoraType;

/**
 * BlhBitacora controller.
 *
 * @Route("/blhbitacora")
 */
class BlhBitacoraController extends Controller
{

    /**
     * Lists all BlhBitacora entities.
     *
     * @Route("/", name="blhbitacora")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhBitacora')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhBitacora entity.
     *
     * @Route("/", name="blhbitacora_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhBitacora:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhBitacora();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhbitacora_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhBitacora entity.
    *
    * @param BlhBitacora $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhBitacora $entity)
    {
        $form = $this->createForm(new BlhBitacoraType(), $entity, array(
            'action' => $this->generateUrl('blhbitacora_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhBitacora entity.
     *
     * @Route("/new", name="blhbitacora_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhBitacora();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhBitacora entity.
     *
     * @Route("/{id}", name="blhbitacora_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhBitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhBitacora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhBitacora entity.
     *
     * @Route("/{id}/edit", name="blhbitacora_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhBitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhBitacora entity.');
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
    * Creates a form to edit a BlhBitacora entity.
    *
    * @param BlhBitacora $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhBitacora $entity)
    {
        $form = $this->createForm(new BlhBitacoraType(), $entity, array(
            'action' => $this->generateUrl('blhbitacora_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhBitacora entity.
     *
     * @Route("/{id}", name="blhbitacora_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhBitacora:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhBitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhBitacora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhbitacora_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhBitacora entity.
     *
     * @Route("/{id}", name="blhbitacora_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhBitacora')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhBitacora entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhbitacora'));
    }

    /**
     * Creates a form to delete a BlhBitacora entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhbitacora_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}