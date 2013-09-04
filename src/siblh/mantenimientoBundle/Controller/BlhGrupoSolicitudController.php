<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhGrupoSolicitud;
use siblh\mantenimientoBundle\Form\BlhGrupoSolicitudType;

/**
 * BlhGrupoSolicitud controller.
 *
 * @Route("/blhgruposolicitud")
 */
class BlhGrupoSolicitudController extends Controller
{

    /**
     * Lists all BlhGrupoSolicitud entities.
     *
     * @Route("/", name="blhgruposolicitud")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhGrupoSolicitud')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhGrupoSolicitud entity.
     *
     * @Route("/", name="blhgruposolicitud_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhGrupoSolicitud:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhGrupoSolicitud();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhgruposolicitud_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhGrupoSolicitud entity.
    *
    * @param BlhGrupoSolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhGrupoSolicitud $entity)
    {
        $form = $this->createForm(new BlhGrupoSolicitudType(), $entity, array(
            'action' => $this->generateUrl('blhgruposolicitud_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhGrupoSolicitud entity.
     *
     * @Route("/new", name="blhgruposolicitud_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhGrupoSolicitud();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhGrupoSolicitud entity.
     *
     * @Route("/{id}", name="blhgruposolicitud_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhGrupoSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhGrupoSolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhGrupoSolicitud entity.
     *
     * @Route("/{id}/edit", name="blhgruposolicitud_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhGrupoSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhGrupoSolicitud entity.');
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
    * Creates a form to edit a BlhGrupoSolicitud entity.
    *
    * @param BlhGrupoSolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhGrupoSolicitud $entity)
    {
        $form = $this->createForm(new BlhGrupoSolicitudType(), $entity, array(
            'action' => $this->generateUrl('blhgruposolicitud_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhGrupoSolicitud entity.
     *
     * @Route("/{id}", name="blhgruposolicitud_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhGrupoSolicitud:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhGrupoSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhGrupoSolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhgruposolicitud_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhGrupoSolicitud entity.
     *
     * @Route("/{id}", name="blhgruposolicitud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhGrupoSolicitud')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhGrupoSolicitud entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhgruposolicitud'));
    }

    /**
     * Creates a form to delete a BlhGrupoSolicitud entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhgruposolicitud_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
