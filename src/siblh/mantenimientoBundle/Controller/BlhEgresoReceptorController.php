<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhEgresoReceptor;
use siblh\mantenimientoBundle\Form\BlhEgresoReceptorType;

/**
 * BlhEgresoReceptor controller.
 *
 * @Route("/blhegresoreceptor")
 */
class BlhEgresoReceptorController extends Controller
{

    /**
     * Lists all BlhEgresoReceptor entities.
     *
     * @Route("/", name="blhegresoreceptor")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhEgresoReceptor')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhEgresoReceptor entity.
     *
     * @Route("/", name="blhegresoreceptor_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhEgresoReceptor:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhEgresoReceptor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhegresoreceptor_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhEgresoReceptor entity.
    *
    * @param BlhEgresoReceptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhEgresoReceptor $entity)
    {
        $form = $this->createForm(new BlhEgresoReceptorType(), $entity, array(
            'action' => $this->generateUrl('blhegresoreceptor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhEgresoReceptor entity.
     *
     * @Route("/new", name="blhegresoreceptor_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhEgresoReceptor();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhEgresoReceptor entity.
     *
     * @Route("/{id}", name="blhegresoreceptor_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhEgresoReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhEgresoReceptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhEgresoReceptor entity.
     *
     * @Route("/{id}/edit", name="blhegresoreceptor_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhEgresoReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhEgresoReceptor entity.');
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
    * Creates a form to edit a BlhEgresoReceptor entity.
    *
    * @param BlhEgresoReceptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhEgresoReceptor $entity)
    {
        $form = $this->createForm(new BlhEgresoReceptorType(), $entity, array(
            'action' => $this->generateUrl('blhegresoreceptor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhEgresoReceptor entity.
     *
     * @Route("/{id}", name="blhegresoreceptor_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhEgresoReceptor:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhEgresoReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhEgresoReceptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhegresoreceptor_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhEgresoReceptor entity.
     *
     * @Route("/{id}", name="blhegresoreceptor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhEgresoReceptor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhEgresoReceptor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhegresoreceptor'));
    }

    /**
     * Creates a form to delete a BlhEgresoReceptor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhegresoreceptor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
