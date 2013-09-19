<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhTelefono;
use siblh\mantenimientoBundle\Form\BlhTelefonoType;

/**
 * BlhTelefono controller.
 *
 * @Route("/blhtelefono")
 */
class BlhTelefonoController extends Controller
{

    /**
     * Lists all BlhTelefono entities.
     *
     * @Route("/", name="blhtelefono")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhTelefono')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhTelefono entity.
     *
     * @Route("/", name="blhtelefono_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhTelefono:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhTelefono();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhtelefono_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhTelefono entity.
    *
    * @param BlhTelefono $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhTelefono $entity)
    {
        $form = $this->createForm(new BlhTelefonoType(), $entity, array(
            'action' => $this->generateUrl('blhtelefono_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhTelefono entity.
     *
     * @Route("/new", name="blhtelefono_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhTelefono();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhTelefono entity.
     *
     * @Route("/{id}", name="blhtelefono_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhTelefono')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhTelefono entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhTelefono entity.
     *
     * @Route("/{id}/edit", name="blhtelefono_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhTelefono')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhTelefono entity.');
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
    * Creates a form to edit a BlhTelefono entity.
    *
    * @param BlhTelefono $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhTelefono $entity)
    {
        $form = $this->createForm(new BlhTelefonoType(), $entity, array(
            'action' => $this->generateUrl('blhtelefono_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhTelefono entity.
     *
     * @Route("/{id}", name="blhtelefono_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhTelefono:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhTelefono')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhTelefono entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhtelefono_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhTelefono entity.
     *
     * @Route("/{id}", name="blhtelefono_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhTelefono')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhTelefono entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhtelefono'));
    }

    /**
     * Creates a form to delete a BlhTelefono entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhtelefono_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
