<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhSubOpcionMenu;
use siblh\mantenimientoBundle\Form\BlhSubOpcionMenuType;

/**
 * BlhSubOpcionMenu controller.
 *
 * @Route("/blhsubopcionmenu")
 */
class BlhSubOpcionMenuController extends Controller
{

    /**
     * Lists all BlhSubOpcionMenu entities.
     *
     * @Route("/", name="blhsubopcionmenu")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhSubOpcionMenu')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhSubOpcionMenu entity.
     *
     * @Route("/", name="blhsubopcionmenu_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhSubOpcionMenu:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhSubOpcionMenu();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhsubopcionmenu_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhSubOpcionMenu entity.
    *
    * @param BlhSubOpcionMenu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhSubOpcionMenu $entity)
    {
        $form = $this->createForm(new BlhSubOpcionMenuType(), $entity, array(
            'action' => $this->generateUrl('blhsubopcionmenu_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhSubOpcionMenu entity.
     *
     * @Route("/new", name="blhsubopcionmenu_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhSubOpcionMenu();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhSubOpcionMenu entity.
     *
     * @Route("/{id}", name="blhsubopcionmenu_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhSubOpcionMenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhSubOpcionMenu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhSubOpcionMenu entity.
     *
     * @Route("/{id}/edit", name="blhsubopcionmenu_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhSubOpcionMenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhSubOpcionMenu entity.');
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
    * Creates a form to edit a BlhSubOpcionMenu entity.
    *
    * @param BlhSubOpcionMenu $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhSubOpcionMenu $entity)
    {
        $form = $this->createForm(new BlhSubOpcionMenuType(), $entity, array(
            'action' => $this->generateUrl('blhsubopcionmenu_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhSubOpcionMenu entity.
     *
     * @Route("/{id}", name="blhsubopcionmenu_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhSubOpcionMenu:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhSubOpcionMenu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhSubOpcionMenu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhsubopcionmenu_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhSubOpcionMenu entity.
     *
     * @Route("/{id}", name="blhsubopcionmenu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhSubOpcionMenu')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhSubOpcionMenu entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhsubopcionmenu'));
    }

    /**
     * Creates a form to delete a BlhSubOpcionMenu entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhsubopcionmenu_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
