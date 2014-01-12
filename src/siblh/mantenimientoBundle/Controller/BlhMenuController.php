<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhMenu;
use siblh\mantenimientoBundle\Form\BlhMenuType;

/**
 * BlhMenu controller.
 *
 * @Route("/blhmenu")
 */
class BlhMenuController extends Controller
{

    /**
     * Lists all BlhMenu entities.
     *
     * @Route("/", name="blhmenu")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhMenu')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhMenu entity.
     *
     * @Route("/", name="blhmenu_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhMenu:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhMenu();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhmenu_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhMenu entity.
    *
    * @param BlhMenu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhMenu $entity)
    {
        $form = $this->createForm(new BlhMenuType(), $entity, array(
            'action' => $this->generateUrl('blhmenu_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhMenu entity.
     *
     * @Route("/new", name="blhmenu_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhMenu();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhMenu entity.
     *
     * @Route("/{id}", name="blhmenu_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhMenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhMenu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhMenu entity.
     *
     * @Route("/{id}/edit", name="blhmenu_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhMenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhMenu entity.');
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
    * Creates a form to edit a BlhMenu entity.
    *
    * @param BlhMenu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhMenu $entity)
    {
        $form = $this->createForm(new BlhMenuType(), $entity, array(
            'action' => $this->generateUrl('blhmenu_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhMenu entity.
     *
     * @Route("/{id}", name="blhmenu_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhMenu:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhMenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhMenu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhmenu_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhMenu entity.
     *
     * @Route("/{id}", name="blhmenu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhMenu')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhMenu entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhmenu'));
    }

    /**
     * Creates a form to delete a BlhMenu entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhmenu_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}