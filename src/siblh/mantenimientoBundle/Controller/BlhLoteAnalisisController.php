<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhLoteAnalisis;
use siblh\mantenimientoBundle\Form\BlhLoteAnalisisType;

/**
 * BlhLoteAnalisis controller.
 *
 * @Route("/blhloteanalisis")
 */
class BlhLoteAnalisisController extends Controller
{

    /**
     * Lists all BlhLoteAnalisis entities.
     *
     * @Route("/", name="blhloteanalisis")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhLoteAnalisis')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhLoteAnalisis entity.
     *
     * @Route("/", name="blhloteanalisis_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhLoteAnalisis:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhLoteAnalisis();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhloteanalisis_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhLoteAnalisis entity.
    *
    * @param BlhLoteAnalisis $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhLoteAnalisis $entity)
    {
        $form = $this->createForm(new BlhLoteAnalisisType(), $entity, array(
            'action' => $this->generateUrl('blhloteanalisis_create'),
            'method' => 'POST',
        ));

       /*$form->add('submit', 'submit', array('label' => 'Create'));*/

        return $form;
    }

    /**
     * Displays a form to create a new BlhLoteAnalisis entity.
     *
     * @Route("/new", name="blhloteanalisis_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhLoteAnalisis();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhLoteAnalisis entity.
     *
     * @Route("/{id}", name="blhloteanalisis_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhLoteAnalisis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhLoteAnalisis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhLoteAnalisis entity.
     *
     * @Route("/{id}/edit", name="blhloteanalisis_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhLoteAnalisis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhLoteAnalisis entity.');
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
    * Creates a form to edit a BlhLoteAnalisis entity.
    *
    * @param BlhLoteAnalisis $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhLoteAnalisis $entity)
    {
        $form = $this->createForm(new BlhLoteAnalisisType(), $entity, array(
            'action' => $this->generateUrl('blhloteanalisis_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhLoteAnalisis entity.
     *
     * @Route("/{id}", name="blhloteanalisis_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhLoteAnalisis:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhLoteAnalisis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhLoteAnalisis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhloteanalisis_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhLoteAnalisis entity.
     *
     * @Route("/{id}", name="blhloteanalisis_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhLoteAnalisis')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhLoteAnalisis entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhloteanalisis'));
    }

    /**
     * Creates a form to delete a BlhLoteAnalisis entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhloteanalisis_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
