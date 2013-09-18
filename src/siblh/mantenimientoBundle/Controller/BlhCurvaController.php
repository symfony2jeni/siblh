<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhCurva;
use siblh\mantenimientoBundle\Form\BlhCurvaType;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * BlhCurva controller.
 *
 * @Route("/blhcurva")
 */
class BlhCurvaController extends Controller
{

    /**
     * Lists all BlhCurva entities.
     *
     * @Route("/", name="blhcurva")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhCurva')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhCurva entity.
     *
     * @Route("/", name="blhcurva_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhCurva:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhCurva();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhcurva_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhCurva entity.
    *
    * @param BlhCurva $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhCurva $entity)
    {
        $form = $this->createForm(new BlhCurvaType(), $entity, array(
            'action' => $this->generateUrl('blhcurva_create'),
            'method' => 'POST',
        ));


        $form->add('submit', 'submit', array('label' => 'Guardar'));

        $form->add('submit', 'submit', array('label' => 'Create'));


        return $form;
    }

    /**
     * Displays a form to create a new BlhCurva entity.
     *
     * @Route("/new", name="blhcurva_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhCurva();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhCurva entity.
     *
     * @Route("/{id}", name="blhcurva_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhCurva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhCurva entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhCurva entity.
     *
     * @Route("/{id}/edit", name="blhcurva_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhCurva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhCurva entity.');
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
    * Creates a form to edit a BlhCurva entity.
    *
    * @param BlhCurva $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhCurva $entity)
    {
        $form = $this->createForm(new BlhCurvaType(), $entity, array(
            'action' => $this->generateUrl('blhcurva_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhCurva entity.
     *
     * @Route("/{id}", name="blhcurva_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhCurva:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhCurva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhCurva entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhcurva_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhCurva entity.
     *
     * @Route("/{id}", name="blhcurva_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhCurva')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhCurva entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhcurva'));
    }

    /**
     * Creates a form to delete a BlhCurva entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhcurva_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
