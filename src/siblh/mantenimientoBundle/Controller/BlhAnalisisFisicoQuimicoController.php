<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhAnalisisFisicoQuimico;
use siblh\mantenimientoBundle\Form\BlhAnalisisFisicoQuimicoType;

/**
 * BlhAnalisisFisicoQuimico controller.
 *
 * @Route("/blhanalisisfisicoquimico")
 */
class BlhAnalisisFisicoQuimicoController extends Controller
{

    /**
     * Lists all BlhAnalisisFisicoQuimico entities.
     *
     * @Route("/", name="blhanalisisfisicoquimico")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisFisicoQuimico')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhAnalisisFisicoQuimico entity.
     *
     * @Route("/", name="blhanalisisfisicoquimico_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhAnalisisFisicoQuimico:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhAnalisisFisicoQuimico();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhanalisisfisicoquimico_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhAnalisisFisicoQuimico entity.
    *
    * @param BlhAnalisisFisicoQuimico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhAnalisisFisicoQuimico $entity)
    {
        $form = $this->createForm(new BlhAnalisisFisicoQuimicoType(), $entity, array(
            'action' => $this->generateUrl('blhanalisisfisicoquimico_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhAnalisisFisicoQuimico entity.
     *
     * @Route("/new", name="blhanalisisfisicoquimico_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhAnalisisFisicoQuimico();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhAnalisisFisicoQuimico entity.
     *
     * @Route("/{id}", name="blhanalisisfisicoquimico_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisFisicoQuimico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAnalisisFisicoQuimico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhAnalisisFisicoQuimico entity.
     *
     * @Route("/{id}/edit", name="blhanalisisfisicoquimico_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisFisicoQuimico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAnalisisFisicoQuimico entity.');
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
    * Creates a form to edit a BlhAnalisisFisicoQuimico entity.
    *
    * @param BlhAnalisisFisicoQuimico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhAnalisisFisicoQuimico $entity)
    {
        $form = $this->createForm(new BlhAnalisisFisicoQuimicoType(), $entity, array(
            'action' => $this->generateUrl('blhanalisisfisicoquimico_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhAnalisisFisicoQuimico entity.
     *
     * @Route("/{id}", name="blhanalisisfisicoquimico_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhAnalisisFisicoQuimico:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisFisicoQuimico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAnalisisFisicoQuimico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhanalisisfisicoquimico_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhAnalisisFisicoQuimico entity.
     *
     * @Route("/{id}", name="blhanalisisfisicoquimico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisFisicoQuimico')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhAnalisisFisicoQuimico entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhanalisisfisicoquimico'));
    }

    /**
     * Creates a form to delete a BlhAnalisisFisicoQuimico entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhanalisisfisicoquimico_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
