<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\CltMunicipio;
use siblh\mantenimientoBundle\Form\CltMunicipioType;

/**
 * CltMunicipio controller.
 *
 * @Route("/cltmunicipio")
 */
class CltMunicipioController extends Controller
{

    /**
     * Lists all CltMunicipio entities.
     *
     * @Route("/", name="cltmunicipio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:CltMunicipio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CltMunicipio entity.
     *
     * @Route("/", name="cltmunicipio_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:CltMunicipio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CltMunicipio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cltmunicipio_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a CltMunicipio entity.
    *
    * @param CltMunicipio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CltMunicipio $entity)
    {
        $form = $this->createForm(new CltMunicipioType(), $entity, array(
            'action' => $this->generateUrl('cltmunicipio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CltMunicipio entity.
     *
     * @Route("/new", name="cltmunicipio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CltMunicipio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CltMunicipio entity.
     *
     * @Route("/{id}", name="cltmunicipio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:CltMunicipio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CltMunicipio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CltMunicipio entity.
     *
     * @Route("/{id}/edit", name="cltmunicipio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:CltMunicipio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CltMunicipio entity.');
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
    * Creates a form to edit a CltMunicipio entity.
    *
    * @param CltMunicipio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CltMunicipio $entity)
    {
        $form = $this->createForm(new CltMunicipioType(), $entity, array(
            'action' => $this->generateUrl('cltmunicipio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CltMunicipio entity.
     *
     * @Route("/{id}", name="cltmunicipio_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:CltMunicipio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:CltMunicipio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CltMunicipio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cltmunicipio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CltMunicipio entity.
     *
     * @Route("/{id}", name="cltmunicipio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:CltMunicipio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CltMunicipio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cltmunicipio'));
    }

    /**
     * Creates a form to delete a CltMunicipio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cltmunicipio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
