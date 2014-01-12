<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhOpcionMenu;
use siblh\mantenimientoBundle\Form\BlhOpcionMenuType;

/**
 * BlhOpcionMenu controller.
 *
 * @Route("/blhopcionmenu")
 */
class BlhOpcionMenuController extends Controller
{

    /**
     * Lists all BlhOpcionMenu entities.
     *
     * @Route("/", name="blhopcionmenu")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhOpcionMenu')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhOpcionMenu entity.
     *
     * @Route("/", name="blhopcionmenu_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhOpcionMenu:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhOpcionMenu();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhopcionmenu_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhOpcionMenu entity.
    *
    * @param BlhOpcionMenu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhOpcionMenu $entity)
    {
        $form = $this->createForm(new BlhOpcionMenuType(), $entity, array(
            'action' => $this->generateUrl('blhopcionmenu_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhOpcionMenu entity.
     *
     * @Route("/new", name="blhopcionmenu_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhOpcionMenu();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhOpcionMenu entity.
     *
     * @Route("/{id}", name="blhopcionmenu_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhOpcionMenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhOpcionMenu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhOpcionMenu entity.
     *
     * @Route("/{id}/edit", name="blhopcionmenu_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhOpcionMenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhOpcionMenu entity.');
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
    * Creates a form to edit a BlhOpcionMenu entity.
    *
    * @param BlhOpcionMenu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhOpcionMenu $entity)
    {
        $form = $this->createForm(new BlhOpcionMenuType(), $entity, array(
            'action' => $this->generateUrl('blhopcionmenu_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhOpcionMenu entity.
     *
     * @Route("/{id}", name="blhopcionmenu_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhOpcionMenu:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhOpcionMenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhOpcionMenu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhopcionmenu_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhOpcionMenu entity.
     *
     * @Route("/{id}", name="blhopcionmenu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhOpcionMenu')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhOpcionMenu entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhopcionmenu'));
    }

    /**
     * Creates a form to delete a BlhOpcionMenu entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhopcionmenu_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}