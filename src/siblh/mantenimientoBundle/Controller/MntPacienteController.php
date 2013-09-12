<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\MntPaciente;
use siblh\mantenimientoBundle\Form\MntPacienteType;

/**
 * MntPaciente controller.
 *
 * @Route("/mntpaciente")
 */
class MntPacienteController extends Controller
{

    /**
     * Lists all MntPaciente entities.
     *
     * @Route("/", name="mntpaciente")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:MntPaciente')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new MntPaciente entity.
     *
     * @Route("/", name="mntpaciente_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:MntPaciente:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new MntPaciente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mntpaciente_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a MntPaciente entity.
    *
    * @param MntPaciente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(MntPaciente $entity)
    {
        $form = $this->createForm(new MntPacienteType(), $entity, array(
            'action' => $this->generateUrl('mntpaciente_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MntPaciente entity.
     *
     * @Route("/new", name="mntpaciente_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MntPaciente();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a MntPaciente entity.
     *
     * @Route("/{id}", name="mntpaciente_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:MntPaciente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MntPaciente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing MntPaciente entity.
     *
     * @Route("/{id}/edit", name="mntpaciente_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:MntPaciente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MntPaciente entity.');
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
    * Creates a form to edit a MntPaciente entity.
    *
    * @param MntPaciente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MntPaciente $entity)
    {
        $form = $this->createForm(new MntPacienteType(), $entity, array(
            'action' => $this->generateUrl('mntpaciente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MntPaciente entity.
     *
     * @Route("/{id}", name="mntpaciente_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:MntPaciente:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:MntPaciente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MntPaciente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mntpaciente_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a MntPaciente entity.
     *
     * @Route("/{id}", name="mntpaciente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:MntPaciente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MntPaciente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mntpaciente'));
    }

    /**
     * Creates a form to delete a MntPaciente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mntpaciente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
