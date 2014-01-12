<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\CtlDepartamento;
use siblh\mantenimientoBundle\Form\CtlDepartamentoType;

/**
 * CtlDepartamento controller.
 *
 * @Route("/ctldepartamento")
 */
class CtlDepartamentoController extends Controller
{

    /**
     * Lists all CtlDepartamento entities.
     *
     * @Route("/", name="ctldepartamento")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:CtlDepartamento')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CtlDepartamento entity.
     *
     * @Route("/", name="ctldepartamento_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:CtlDepartamento:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CtlDepartamento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ctldepartamento_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a CtlDepartamento entity.
    *
    * @param CtlDepartamento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CtlDepartamento $entity)
    {
        $form = $this->createForm(new CtlDepartamentoType(), $entity, array(
            'action' => $this->generateUrl('ctldepartamento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CtlDepartamento entity.
     *
     * @Route("/new", name="ctldepartamento_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CtlDepartamento();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CtlDepartamento entity.
     *
     * @Route("/{id}", name="ctldepartamento_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:CtlDepartamento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CtlDepartamento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CtlDepartamento entity.
     *
     * @Route("/{id}/edit", name="ctldepartamento_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:CtlDepartamento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CtlDepartamento entity.');
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
    * Creates a form to edit a CtlDepartamento entity.
    *
    * @param CtlDepartamento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CtlDepartamento $entity)
    {
        $form = $this->createForm(new CtlDepartamentoType(), $entity, array(
            'action' => $this->generateUrl('ctldepartamento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CtlDepartamento entity.
     *
     * @Route("/{id}", name="ctldepartamento_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:CtlDepartamento:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:CtlDepartamento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CtlDepartamento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ctldepartamento_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CtlDepartamento entity.
     *
     * @Route("/{id}", name="ctldepartamento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:CtlDepartamento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CtlDepartamento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ctldepartamento'));
    }

    /**
     * Creates a form to delete a CtlDepartamento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ctldepartamento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}