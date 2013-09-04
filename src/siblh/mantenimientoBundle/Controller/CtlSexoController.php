<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\CtlSexo;
use siblh\mantenimientoBundle\Form\CtlSexoType;

/**
 * CtlSexo controller.
 *
 * @Route("/ctlsexo")
 */
class CtlSexoController extends Controller
{

    /**
     * Lists all CtlSexo entities.
     *
     * @Route("/", name="ctlsexo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:CtlSexo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CtlSexo entity.
     *
     * @Route("/", name="ctlsexo_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:CtlSexo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CtlSexo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ctlsexo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a CtlSexo entity.
    *
    * @param CtlSexo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CtlSexo $entity)
    {
        $form = $this->createForm(new CtlSexoType(), $entity, array(
            'action' => $this->generateUrl('ctlsexo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CtlSexo entity.
     *
     * @Route("/new", name="ctlsexo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CtlSexo();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CtlSexo entity.
     *
     * @Route("/{id}", name="ctlsexo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:CtlSexo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CtlSexo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CtlSexo entity.
     *
     * @Route("/{id}/edit", name="ctlsexo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:CtlSexo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CtlSexo entity.');
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
    * Creates a form to edit a CtlSexo entity.
    *
    * @param CtlSexo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CtlSexo $entity)
    {
        $form = $this->createForm(new CtlSexoType(), $entity, array(
            'action' => $this->generateUrl('ctlsexo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CtlSexo entity.
     *
     * @Route("/{id}", name="ctlsexo_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:CtlSexo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:CtlSexo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CtlSexo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ctlsexo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CtlSexo entity.
     *
     * @Route("/{id}", name="ctlsexo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:CtlSexo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CtlSexo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ctlsexo'));
    }

    /**
     * Creates a form to delete a CtlSexo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ctlsexo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
