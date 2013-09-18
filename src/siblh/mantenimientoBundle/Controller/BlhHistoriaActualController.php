<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhHistoriaActual;
use siblh\mantenimientoBundle\Form\BlhHistoriaActualType;

/**
 * BlhHistoriaActual controller.
 *
 * @Route("/blhhistoriaactual")
 */
class BlhHistoriaActualController extends Controller
{

    /**
     * Lists all BlhHistoriaActual entities.
     *
     * @Route("/", name="blhhistoriaactual")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhHistoriaActual')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhHistoriaActual entity.
     *
     * @Route("/", name="blhhistoriaactual_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhHistoriaActual:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhHistoriaActual();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhhistoriaactual_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhHistoriaActual entity.
    *
    * @param BlhHistoriaActual $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhHistoriaActual $entity)
    {
        $form = $this->createForm(new BlhHistoriaActualType(), $entity, array(
            'action' => $this->generateUrl('blhhistoriaactual_create'),
            'method' => 'POST',
        ));


       // $form->add('submit', 'submit', array('label' => 'Create'));

     //   $form->add('submit', 'submit', array('label' => 'Create'));


        return $form;
    }

    /**
     * Displays a form to create a new BlhHistoriaActual entity.
     *
     * @Route("/new", name="blhhistoriaactual_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhHistoriaActual();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhHistoriaActual entity.
     *
     * @Route("/{id}", name="blhhistoriaactual_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistoriaActual')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhHistoriaActual entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhHistoriaActual entity.
     *
     * @Route("/{id}/edit", name="blhhistoriaactual_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistoriaActual')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhHistoriaActual entity.');
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
    * Creates a form to edit a BlhHistoriaActual entity.
    *
    * @param BlhHistoriaActual $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhHistoriaActual $entity)
    {
        $form = $this->createForm(new BlhHistoriaActualType(), $entity, array(
            'action' => $this->generateUrl('blhhistoriaactual_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhHistoriaActual entity.
     *
     * @Route("/{id}", name="blhhistoriaactual_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhHistoriaActual:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistoriaActual')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhHistoriaActual entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhhistoriaactual_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhHistoriaActual entity.
     *
     * @Route("/{id}", name="blhhistoriaactual_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistoriaActual')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhHistoriaActual entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhhistoriaactual'));
    }

    /**
     * Creates a form to delete a BlhHistoriaActual entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhhistoriaactual_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
