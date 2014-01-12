<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhExamen;
use siblh\mantenimientoBundle\Form\BlhExamenType;

/**
 * BlhExamen controller.
 *
 * @Route("/blhexamen")
 */
class BlhExamenController extends Controller
{

    /**
     * Lists all BlhExamen entities.
     *
     * @Route("/", name="blhexamen")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhExamen')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhExamen entity.
     *
     * @Route("/", name="blhexamen_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhExamen:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhExamen();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhexamen_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhExamen entity.
    *
    * @param BlhExamen $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhExamen $entity)
    {
        $form = $this->createForm(new BlhExamenType(), $entity, array(
            'action' => $this->generateUrl('blhexamen_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhExamen entity.
     *
     * @Route("/new", name="blhexamen_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhExamen();
			   $user_ID = $this->container->get('security.context')->getToken()->getUser()->getId();

        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
			'user_ID' => $user_ID,
        );
    }

    /**
     * Finds and displays a BlhExamen entity.
     *
     * @Route("/{id}", name="blhexamen_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhExamen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhExamen entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhExamen entity.
     *
     * @Route("/{id}/edit", name="blhexamen_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
	   $user_ID = $this->container->get('security.context')->getToken()->getUser()->getId();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhExamen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhExamen entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
			'user_ID' => $user_ID,
        );
    }

    /**
    * Creates a form to edit a BlhExamen entity.
    *
    * @param BlhExamen $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhExamen $entity)
    {
        $form = $this->createForm(new BlhExamenType(), $entity, array(
            'action' => $this->generateUrl('blhexamen_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhExamen entity.
     *
     * @Route("/{id}", name="blhexamen_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhExamen:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhExamen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhExamen entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhexamen_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhExamen entity.
     *
     * @Route("/{id}", name="blhexamen_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhExamen')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhExamen entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhexamen'));
    }

    /**
     * Creates a form to delete a BlhExamen entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhexamen_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}