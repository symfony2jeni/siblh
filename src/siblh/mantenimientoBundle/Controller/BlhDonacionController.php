<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhDonacion;
use siblh\mantenimientoBundle\Form\BlhDonacionType;

/**
 * BlhDonacion controller.
 *
 * @Route("/blhdonacion")
 */
class BlhDonacionController extends Controller
{

    /**
     * Lists all BlhDonacion entities.
     *
     * @Route("/", name="blhdonacion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhDonacion')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhDonacion entity.
     *
     * @Route("/", name="blhdonacion_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhDonacion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhDonacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhdonacion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhDonacion entity.
    *
    * @param BlhDonacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhDonacion $entity)
    {
        $form = $this->createForm(new BlhDonacionType(), $entity, array(
            'action' => $this->generateUrl('blhdonacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhDonacion entity.
     *
     * @Route("/new", name="blhdonacion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhDonacion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhDonacion entity.
     *
     * @Route("/{id}", name="blhdonacion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhDonacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhDonacion entity.
     *
     * @Route("/{id}/edit", name="blhdonacion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhDonacion entity.');
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
    * Creates a form to edit a BlhDonacion entity.
    *
    * @param BlhDonacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhDonacion $entity)
    {
        $form = $this->createForm(new BlhDonacionType(), $entity, array(
            'action' => $this->generateUrl('blhdonacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhDonacion entity.
     *
     * @Route("/{id}", name="blhdonacion_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhDonacion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhDonacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhdonacion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhDonacion entity.
     *
     * @Route("/{id}", name="blhdonacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhDonacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhdonacion'));
    }

    /**
     * Creates a form to delete a BlhDonacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhdonacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}