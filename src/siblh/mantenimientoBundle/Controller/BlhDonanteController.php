<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhDonante;
use siblh\mantenimientoBundle\Form\BlhDonanteType;

/**
 * BlhDonante controller.
 *
 * @Route("/blhdonante")
 */
class BlhDonanteController extends Controller
{

    /**
     * Lists all BlhDonante entities.
     *
     * @Route("/", name="blhdonante")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhDonante entity.
     *
     * @Route("/", name="blhdonante_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhDonante:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhDonante();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhdonante_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhDonante entity.
    *
    * @param BlhDonante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhDonante $entity)
    {
        $form = $this->createForm(new BlhDonanteType(), $entity, array(
            'action' => $this->generateUrl('blhdonante_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhDonante entity.
     *
     * @Route("/new", name="blhdonante_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhDonante();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhDonante entity.
     *
     * @Route("/{id}", name="blhdonante_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhDonante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhDonante entity.
     *
     * @Route("/{id}/edit", name="blhdonante_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhDonante entity.');
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
    * Creates a form to edit a BlhDonante entity.
    *
    * @param BlhDonante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhDonante $entity)
    {
        $form = $this->createForm(new BlhDonanteType(), $entity, array(
            'action' => $this->generateUrl('blhdonante_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhDonante entity.
     *
     * @Route("/{id}", name="blhdonante_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhDonante:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhDonante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhdonante_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhDonante entity.
     *
     * @Route("/{id}", name="blhdonante_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhDonante entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhdonante'));
    }

    /**
     * Creates a form to delete a BlhDonante entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhdonante_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
