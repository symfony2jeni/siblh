<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhFrascoRecolectadoFrascoP;
use siblh\mantenimientoBundle\Form\BlhFrascoRecolectadoFrascoPType;

/**
 * BlhFrascoRecolectadoFrascoP controller.
 *
 * @Route("/blhfrascorecolectadofrascop")
 */
class BlhFrascoRecolectadoFrascoPController extends Controller
{

    /**
     * Lists all BlhFrascoRecolectadoFrascoP entities.
     *
     * @Route("/", name="blhfrascorecolectadofrascop")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectadoFrascoP')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhFrascoRecolectadoFrascoP entity.
     *
     * @Route("/", name="blhfrascorecolectadofrascop_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhFrascoRecolectadoFrascoP:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhFrascoRecolectadoFrascoP();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
            $entity->setUsuario($usuario);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascorecolectadofrascop_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhFrascoRecolectadoFrascoP entity.
    *
    * @param BlhFrascoRecolectadoFrascoP $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhFrascoRecolectadoFrascoP $entity)
    {
        $form = $this->createForm(new BlhFrascoRecolectadoFrascoPType(), $entity, array(
            'action' => $this->generateUrl('blhfrascorecolectadofrascop_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhFrascoRecolectadoFrascoP entity.
     *
     * @Route("/new", name="blhfrascorecolectadofrascop_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhFrascoRecolectadoFrascoP();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhFrascoRecolectadoFrascoP entity.
     *
     * @Route("/{id}", name="blhfrascorecolectadofrascop_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectadoFrascoP')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoRecolectadoFrascoP entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhFrascoRecolectadoFrascoP entity.
     *
     * @Route("/{id}/edit", name="blhfrascorecolectadofrascop_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectadoFrascoP')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoRecolectadoFrascoP entity.');
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
    * Creates a form to edit a BlhFrascoRecolectadoFrascoP entity.
    *
    * @param BlhFrascoRecolectadoFrascoP $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhFrascoRecolectadoFrascoP $entity)
    {
        $form = $this->createForm(new BlhFrascoRecolectadoFrascoPType(), $entity, array(
            'action' => $this->generateUrl('blhfrascorecolectadofrascop_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhFrascoRecolectadoFrascoP entity.
     *
     * @Route("/{id}", name="blhfrascorecolectadofrascop_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhFrascoRecolectadoFrascoP:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectadoFrascoP')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoRecolectadoFrascoP entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity->setUsuario($usuario);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascorecolectadofrascop_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhFrascoRecolectadoFrascoP entity.
     *
     * @Route("/{id}", name="blhfrascorecolectadofrascop_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectadoFrascoP')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhFrascoRecolectadoFrascoP entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhfrascorecolectadofrascop'));
    }

    /**
     * Creates a form to delete a BlhFrascoRecolectadoFrascoP entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhfrascorecolectadofrascop_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}