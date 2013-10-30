<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhPasteurizacion;
use siblh\mantenimientoBundle\Form\BlhPasteurizacionType;

/**
 * BlhPasteurizacion controller.
 *
 * @Route("/blhpasteurizacion")
 */
class BlhPasteurizacionController extends Controller
{

    /**
     * Lists all BlhPasteurizacion entities.
     *
     * @Route("/", name="blhpasteurizacion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhPasteurizacion entity.
     *
     * @Route("/", name="blhpasteurizacion_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhPasteurizacion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhPasteurizacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhpasteurizacion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhPasteurizacion entity.
    *
    * @param BlhPasteurizacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhPasteurizacion $entity)
    {
        $form = $this->createForm(new BlhPasteurizacionType(), $entity, array(
            'action' => $this->generateUrl('blhpasteurizacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhPasteurizacion entity.
     *
     * @Route("/new", name="blhpasteurizacion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhPasteurizacion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhPasteurizacion entity.
     *
     * @Route("/{id}", name="blhpasteurizacion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhPasteurizacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhPasteurizacion entity.
     *
     * @Route("/{id}/edit", name="blhpasteurizacion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhPasteurizacion entity.');
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
    * Creates a form to edit a BlhPasteurizacion entity.
    *
    * @param BlhPasteurizacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhPasteurizacion $entity)
    {
        $form = $this->createForm(new BlhPasteurizacionType(), $entity, array(
            'action' => $this->generateUrl('blhpasteurizacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhPasteurizacion entity.
     *
     * @Route("/{id}", name="blhpasteurizacion_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhPasteurizacion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhPasteurizacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhpasteurizacion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhPasteurizacion entity.
     *
     * @Route("/{id}", name="blhpasteurizacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhPasteurizacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhpasteurizacion'));
    }

    /**
     * Creates a form to delete a BlhPasteurizacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhpasteurizacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
