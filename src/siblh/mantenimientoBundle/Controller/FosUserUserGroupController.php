<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\FosUserUserGroup;
use siblh\mantenimientoBundle\Form\FosUserUserGroupType;

/**
 * FosUserUserGroup controller.
 *
 * @Route("/fosuserusergroup")
 */
class FosUserUserGroupController extends Controller
{

    /**
     * Lists all FosUserUserGroup entities.
     *
     * @Route("/", name="fosuserusergroup")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:FosUserUserGroup')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new FosUserUserGroup entity.
     *
     * @Route("/", name="fosuserusergroup_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:FosUserUserGroup:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new FosUserUserGroup();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fosuserusergroup_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a FosUserUserGroup entity.
    *
    * @param FosUserUserGroup $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(FosUserUserGroup $entity)
    {
        $form = $this->createForm(new FosUserUserGroupType(), $entity, array(
            'action' => $this->generateUrl('fosuserusergroup_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FosUserUserGroup entity.
     *
     * @Route("/new", name="fosuserusergroup_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new FosUserUserGroup();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a FosUserUserGroup entity.
     *
     * @Route("/{id}", name="fosuserusergroup_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:FosUserUserGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserUserGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing FosUserUserGroup entity.
     *
     * @Route("/{id}/edit", name="fosuserusergroup_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:FosUserUserGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserUserGroup entity.');
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
    * Creates a form to edit a FosUserUserGroup entity.
    *
    * @param FosUserUserGroup $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FosUserUserGroup $entity)
    {
        $form = $this->createForm(new FosUserUserGroupType(), $entity, array(
            'action' => $this->generateUrl('fosuserusergroup_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FosUserUserGroup entity.
     *
     * @Route("/{id}", name="fosuserusergroup_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:FosUserUserGroup:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:FosUserUserGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FosUserUserGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fosuserusergroup_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a FosUserUserGroup entity.
     *
     * @Route("/{id}", name="fosuserusergroup_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:FosUserUserGroup')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FosUserUserGroup entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fosuserusergroup'));
    }

    /**
     * Creates a form to delete a FosUserUserGroup entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fosuserusergroup_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
