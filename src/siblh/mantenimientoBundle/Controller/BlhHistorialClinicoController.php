<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhHistorialClinico;
use siblh\mantenimientoBundle\Form\BlhHistorialClinicoType;

/**
 * BlhHistorialClinico controller.
 *
 * @Route("/blhhistorialclinico")
 */
class BlhHistorialClinicoController extends Controller
{

    /**
     * Lists all BlhHistorialClinico entities.
     *
     * @Route("/", name="blhhistorialclinico")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhHistorialClinico')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhHistorialClinico entity.
     *
     * @Route("/", name="blhhistorialclinico_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhHistorialClinico:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhHistorialClinico();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhhistorialclinico_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhHistorialClinico entity.
    *
    * @param BlhHistorialClinico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhHistorialClinico $entity)
    {
        $form = $this->createForm(new BlhHistorialClinicoType(), $entity, array(
            'action' => $this->generateUrl('blhhistorialclinico_create'),
            'method' => 'POST',
        ));

<<<<<<< HEAD
        $form->add('submit', 'submit', array('label' => 'Create'));
=======
        //$form->add('submit', 'submit', array('label' => 'Create'));
>>>>>>> marvin

        return $form;
    }

    /**
     * Displays a form to create a new BlhHistorialClinico entity.
     *
     * @Route("/new", name="blhhistorialclinico_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhHistorialClinico();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhHistorialClinico entity.
     *
     * @Route("/{id}", name="blhhistorialclinico_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistorialClinico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhHistorialClinico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhHistorialClinico entity.
     *
     * @Route("/{id}/edit", name="blhhistorialclinico_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistorialClinico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhHistorialClinico entity.');
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
    * Creates a form to edit a BlhHistorialClinico entity.
    *
    * @param BlhHistorialClinico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhHistorialClinico $entity)
    {
        $form = $this->createForm(new BlhHistorialClinicoType(), $entity, array(
            'action' => $this->generateUrl('blhhistorialclinico_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhHistorialClinico entity.
     *
     * @Route("/{id}", name="blhhistorialclinico_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhHistorialClinico:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistorialClinico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhHistorialClinico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhhistorialclinico_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhHistorialClinico entity.
     *
     * @Route("/{id}", name="blhhistorialclinico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistorialClinico')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhHistorialClinico entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhhistorialclinico'));
    }

    /**
     * Creates a form to delete a BlhHistorialClinico entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhhistorialclinico_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
