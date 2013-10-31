<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\CtlMunicipio;
use siblh\mantenimientoBundle\Form\CtlMunicipioType;

/**
 * CtlMunicipio controller.
 *
 * @Route("/ctlmunicipio")
 */
class CtlMunicipioController extends Controller
{

    /**
     * Lists all CtlMunicipio entities.
     *
     * @Route("/", name="ctlmunicipio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:CtlMunicipio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CtlMunicipio entity.
     *
     * @Route("/", name="ctlmunicipio_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:CtlMunicipio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CtlMunicipio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ctlmunicipio_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a CtlMunicipio entity.
    *
    * @param CtlMunicipio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CtlMunicipio $entity)
    {
        $form = $this->createForm(new CtlMunicipioType(), $entity, array(
            'action' => $this->generateUrl('ctlmunicipio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CtlMunicipio entity.
     *
     * @Route("/new", name="ctlmunicipio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CtlMunicipio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CtlMunicipio entity.
     *
     * @Route("/{id}", name="ctlmunicipio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:CtlMunicipio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CtlMunicipio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CtlMunicipio entity.
     *
     * @Route("/{id}/edit", name="ctlmunicipio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:CtlMunicipio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CtlMunicipio entity.');
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
    * Creates a form to edit a CtlMunicipio entity.
    *
    * @param CtlMunicipio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CtlMunicipio $entity)
    {
        $form = $this->createForm(new CtlMunicipioType(), $entity, array(
            'action' => $this->generateUrl('ctlmunicipio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CtlMunicipio entity.
     *
     * @Route("/{id}", name="ctlmunicipio_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:CtlMunicipio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:CtlMunicipio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CtlMunicipio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ctlmunicipio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CtlMunicipio entity.
     *
     * @Route("/{id}", name="ctlmunicipio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:CtlMunicipio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CtlMunicipio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ctlmunicipio'));
    }

    /**
     * Creates a form to delete a CtlMunicipio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ctlmunicipio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
