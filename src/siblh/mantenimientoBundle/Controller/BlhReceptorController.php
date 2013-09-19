<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhReceptor;
use siblh\mantenimientoBundle\Form\BlhReceptorType;

/**
 * BlhReceptor controller.
 *
 * @Route("/blhreceptor")
 */
class BlhReceptorController extends Controller
{

    /**
     * Lists all BlhReceptor entities.
     *
     * @Route("/", name="blhreceptor")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhReceptor entity.
     *
     * @Route("/", name="blhreceptor_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhReceptor:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhReceptor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhreceptor_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhReceptor entity.
    *
    * @param BlhReceptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhReceptor $entity)
    {
        $form = $this->createForm(new BlhReceptorType(), $entity, array(
            'action' => $this->generateUrl('blhreceptor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhReceptor entity.
     *
     * @Route("/new", name="blhreceptor_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhReceptor();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhReceptor entity.
     *
     * @Route("/{id}", name="blhreceptor_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhReceptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhReceptor entity.
     *
     * @Route("/{id}/edit", name="blhreceptor_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhReceptor entity.');
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
    * Creates a form to edit a BlhReceptor entity.
    *
    * @param BlhReceptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhReceptor $entity)
    {
        $form = $this->createForm(new BlhReceptorType(), $entity, array(
            'action' => $this->generateUrl('blhreceptor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhReceptor entity.
     *
     * @Route("/{id}", name="blhreceptor_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhReceptor:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhReceptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhreceptor_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhReceptor entity.
     *
     * @Route("/{id}", name="blhreceptor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhReceptor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhreceptor'));
    }

    /**
     * Creates a form to delete a BlhReceptor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhreceptor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
