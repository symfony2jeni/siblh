<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\FosUserGroup;
use siblh\mantenimientoBundle\Form\FosUserGroupType;

/**
 * FosUserGroup controller.
 *
 * @Route("/fosusergroup")
 */
class FosUserGroupController extends Controller
{

    /**
     * Lists all FosUserGroup entities.
     *
     * @Route("/", name="fosusergroup")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:FosUserGroup')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new FosUserGroup entity.
     *
     * @Route("/", name="fosusergroup_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:FosUserGroup:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new FosUserGroup();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fosusergroup_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a FosUserGroup entity.
    *
    * @param FosUserGroup $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(FosUserGroup $entity)
    {
        $form = $this->createForm(new FosUserGroupType(), $entity, array(
            'action' => $this->generateUrl('fosusergroup_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FosUserGroup entity.
     *
     * @Route("/new", name="fosusergroup_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new FosUserGroup();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a FosUserGroup entity.
     *
     * @Route("/{id}", name="fosusergroup_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:FosUserGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing FosUserGroup entity.
     *
     * @Route("/{id}/edit", name="fosusergroup_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:FosUserGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserGroup entity.');
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
    * Creates a form to edit a FosUserGroup entity.
    *
    * @param FosUserGroup $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FosUserGroup $entity)
    {
        $form = $this->createForm(new FosUserGroupType(), $entity, array(
            'action' => $this->generateUrl('fosusergroup_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FosUserGroup entity.
     *
     * @Route("/{id}", name="fosusergroup_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:FosUserGroup:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:FosUserGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fosusergroup_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a FosUserGroup entity.
     *
     * @Route("/{id}", name="fosusergroup_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:FosUserGroup')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FosUserGroup entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fosusergroup'));
    }

    /**
     * Creates a form to delete a FosUserGroup entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fosusergroup_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
