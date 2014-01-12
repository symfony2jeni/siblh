<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhRolMenu;
use siblh\mantenimientoBundle\Form\BlhRolMenuType;

/**
 * BlhRolMenu controller.
 *
 * @Route("/blhrolmenu")
 */
class BlhRolMenuController extends Controller
{

    /**
     * Lists all BlhRolMenu entities.
     *
     * @Route("/", name="blhrolmenu")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhRolMenu')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhRolMenu entity.
     *
     * @Route("/", name="blhrolmenu_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhRolMenu:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhRolMenu();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhrolmenu_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhRolMenu entity.
    *
    * @param BlhRolMenu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhRolMenu $entity)
    {
        $form = $this->createForm(new BlhRolMenuType(), $entity, array(
            'action' => $this->generateUrl('blhrolmenu_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhRolMenu entity.
     *
     * @Route("/new", name="blhrolmenu_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhRolMenu();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhRolMenu entity.
     *
     * @Route("/{id}", name="blhrolmenu_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhRolMenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhRolMenu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhRolMenu entity.
     *
     * @Route("/{id}/edit", name="blhrolmenu_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhRolMenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhRolMenu entity.');
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
    * Creates a form to edit a BlhRolMenu entity.
    *
    * @param BlhRolMenu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhRolMenu $entity)
    {
        $form = $this->createForm(new BlhRolMenuType(), $entity, array(
            'action' => $this->generateUrl('blhrolmenu_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhRolMenu entity.
     *
     * @Route("/{id}", name="blhrolmenu_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhRolMenu:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhRolMenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhRolMenu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhrolmenu_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhRolMenu entity.
     *
     * @Route("/{id}", name="blhrolmenu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhRolMenu')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhRolMenu entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhrolmenu'));
    }

    /**
     * Creates a form to delete a BlhRolMenu entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhrolmenu_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}