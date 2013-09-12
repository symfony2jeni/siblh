<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhFrascoRecolectado;
use siblh\mantenimientoBundle\Form\BlhFrascoRecolectadoType;

/**
 * BlhFrascoRecolectado controller.
 *
 * @Route("/blhfrascorecolectado")
 */
class BlhFrascoRecolectadoController extends Controller
{

    /**
     * Lists all BlhFrascoRecolectado entities.
     *
     * @Route("/", name="blhfrascorecolectado")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhFrascoRecolectado entity.
     *
     * @Route("/", name="blhfrascorecolectado_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhFrascoRecolectado:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhFrascoRecolectado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascorecolectado_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhFrascoRecolectado entity.
    *
    * @param BlhFrascoRecolectado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhFrascoRecolectado $entity)
    {
        $form = $this->createForm(new BlhFrascoRecolectadoType(), $entity, array(
            'action' => $this->generateUrl('blhfrascorecolectado_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhFrascoRecolectado entity.
     *
     * @Route("/new", name="blhfrascorecolectado_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhFrascoRecolectado();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhFrascoRecolectado entity.
     *
     * @Route("/{id}", name="blhfrascorecolectado_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoRecolectado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhFrascoRecolectado entity.
     *
     * @Route("/{id}/edit", name="blhfrascorecolectado_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoRecolectado entity.');
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
    * Creates a form to edit a BlhFrascoRecolectado entity.
    *
    * @param BlhFrascoRecolectado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhFrascoRecolectado $entity)
    {
        $form = $this->createForm(new BlhFrascoRecolectadoType(), $entity, array(
            'action' => $this->generateUrl('blhfrascorecolectado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhFrascoRecolectado entity.
     *
     * @Route("/{id}", name="blhfrascorecolectado_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhFrascoRecolectado:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoRecolectado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascorecolectado_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhFrascoRecolectado entity.
     *
     * @Route("/{id}", name="blhfrascorecolectado_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhFrascoRecolectado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhfrascorecolectado'));
    }

    /**
     * Creates a form to delete a BlhFrascoRecolectado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhfrascorecolectado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
