<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\MntExpediente;
use siblh\mantenimientoBundle\Form\MntExpedienteType;

/**
 * MntExpediente controller.
 *
 * @Route("/mntexpediente")
 */
class MntExpedienteController extends Controller
{

    /**
     * Lists all MntExpediente entities.
     *
     * @Route("/", name="mntexpediente")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:MntExpediente')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new MntExpediente entity.
     *
     * @Route("/", name="mntexpediente_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:MntExpediente:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new MntExpediente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mntexpediente_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a MntExpediente entity.
    *
    * @param MntExpediente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(MntExpediente $entity)
    {
        $form = $this->createForm(new MntExpedienteType(), $entity, array(
            'action' => $this->generateUrl('mntexpediente_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MntExpediente entity.
     *
     * @Route("/new", name="mntexpediente_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MntExpediente();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a MntExpediente entity.
     *
     * @Route("/{id}", name="mntexpediente_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:MntExpediente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MntExpediente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing MntExpediente entity.
     *
     * @Route("/{id}/edit", name="mntexpediente_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:MntExpediente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MntExpediente entity.');
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
    * Creates a form to edit a MntExpediente entity.
    *
    * @param MntExpediente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MntExpediente $entity)
    {
        $form = $this->createForm(new MntExpedienteType(), $entity, array(
            'action' => $this->generateUrl('mntexpediente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MntExpediente entity.
     *
     * @Route("/{id}", name="mntexpediente_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:MntExpediente:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:MntExpediente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MntExpediente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mntexpediente_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a MntExpediente entity.
     *
     * @Route("/{id}", name="mntexpediente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:MntExpediente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MntExpediente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mntexpediente'));
    }

    /**
     * Creates a form to delete a MntExpediente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mntexpediente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
