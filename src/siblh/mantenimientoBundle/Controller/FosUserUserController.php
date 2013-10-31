<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\FosUserUser;
use siblh\mantenimientoBundle\Form\FosUserUserType;

/**
 * FosUserUser controller.
 *
 * @Route("/fosuseruser")
 */
class FosUserUserController extends Controller
{

    /**
     * Lists all FosUserUser entities.
     *
     * @Route("/", name="fosuseruser")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:FosUserUser')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new FosUserUser entity.
     *
     * @Route("/", name="fosuseruser_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:FosUserUser:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new FosUserUser();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fosuseruser_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a FosUserUser entity.
    *
    * @param FosUserUser $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(FosUserUser $entity)
    {
        $form = $this->createForm(new FosUserUserType(), $entity, array(
            'action' => $this->generateUrl('fosuseruser_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FosUserUser entity.
     *
     * @Route("/new", name="fosuseruser_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new FosUserUser();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a FosUserUser entity.
     *
     * @Route("/{id}", name="fosuseruser_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:FosUserUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserUser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing FosUserUser entity.
     *
     * @Route("/{id}/edit", name="fosuseruser_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:FosUserUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserUser entity.');
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
    * Creates a form to edit a FosUserUser entity.
    *
    * @param FosUserUser $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FosUserUser $entity)
    {
        $form = $this->createForm(new FosUserUserType(), $entity, array(
            'action' => $this->generateUrl('fosuseruser_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FosUserUser entity.
     *
     * @Route("/{id}", name="fosuseruser_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:FosUserUser:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:FosUserUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserUser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fosuseruser_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a FosUserUser entity.
     *
     * @Route("/{id}", name="fosuseruser_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:FosUserUser')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FosUserUser entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fosuseruser'));
    }

    /**
     * Creates a form to delete a FosUserUser entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fosuseruser_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
