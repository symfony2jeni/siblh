<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhFrascoProcesadoSolicitud;
use siblh\mantenimientoBundle\Form\BlhFrascoProcesadoSolicitudType;

/**
 * BlhFrascoProcesadoSolicitud controller.
 *
 * @Route("/blhfrascoprocesadosolicitud")
 */
class BlhFrascoProcesadoSolicitudController extends Controller
{

    /**
     * Lists all BlhFrascoProcesadoSolicitud entities.
     *
     * @Route("/", name="blhfrascoprocesadosolicitud")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesadoSolicitud')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhFrascoProcesadoSolicitud entity.
     *
     * @Route("/", name="blhfrascoprocesadosolicitud_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhFrascoProcesadoSolicitud:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhFrascoProcesadoSolicitud();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascoprocesadosolicitud_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhFrascoProcesadoSolicitud entity.
    *
    * @param BlhFrascoProcesadoSolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhFrascoProcesadoSolicitud $entity)
    {
        $form = $this->createForm(new BlhFrascoProcesadoSolicitudType(), $entity, array(
            'action' => $this->generateUrl('blhfrascoprocesadosolicitud_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhFrascoProcesadoSolicitud entity.
     *
     * @Route("/new", name="blhfrascoprocesadosolicitud_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhFrascoProcesadoSolicitud();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhFrascoProcesadoSolicitud entity.
     *
     * @Route("/{id}", name="blhfrascoprocesadosolicitud_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesadoSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoProcesadoSolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhFrascoProcesadoSolicitud entity.
     *
     * @Route("/{id}/edit", name="blhfrascoprocesadosolicitud_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesadoSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoProcesadoSolicitud entity.');
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
    * Creates a form to edit a BlhFrascoProcesadoSolicitud entity.
    *
    * @param BlhFrascoProcesadoSolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhFrascoProcesadoSolicitud $entity)
    {
        $form = $this->createForm(new BlhFrascoProcesadoSolicitudType(), $entity, array(
            'action' => $this->generateUrl('blhfrascoprocesadosolicitud_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhFrascoProcesadoSolicitud entity.
     *
     * @Route("/{id}", name="blhfrascoprocesadosolicitud_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhFrascoProcesadoSolicitud:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesadoSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoProcesadoSolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascoprocesadosolicitud_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhFrascoProcesadoSolicitud entity.
     *
     * @Route("/{id}", name="blhfrascoprocesadosolicitud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesadoSolicitud')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhFrascoProcesadoSolicitud entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhfrascoprocesadosolicitud'));
    }

    /**
     * Creates a form to delete a BlhFrascoProcesadoSolicitud entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhfrascoprocesadosolicitud_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
