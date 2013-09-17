<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhFrascoProcesado;
use siblh\mantenimientoBundle\Form\BlhFrascoProcesadoType;


/**
 * BlhFrascoProcesado controller.
 *
 * @Route("/blhfrascoprocesado")
 */
class BlhFrascoProcesadoController extends Controller
{

    /**
     * Lists all BlhFrascoProcesado entities.
     *
     * @Route("/", name="blhfrascoprocesado")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhFrascoProcesado entity.
     *
     * @Route("/", name="blhfrascoprocesado_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhFrascoProcesado:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhFrascoProcesado();
        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascoprocesado_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhFrascoProcesado entity.
    *
    * @param BlhFrascoProcesado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhFrascoProcesado $entity)
    {
        $form = $this->createForm(new BlhFrascoProcesadoType(), $entity, array(
            'action' => $this->generateUrl('blhfrascoprocesado_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhFrascoProcesado entity.
     *
     * @Route("/new", name="blhfrascoprocesado_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhFrascoProcesado();
        $blhanalisismicrobiologico = new BlhAnalisisMicrobiologico();
        $entity->setBlhAnalisisMicrobiologico($blhanalisismicrobiologico);
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhFrascoProcesado entity.
     *
     * @Route("/{id}", name="blhfrascoprocesado_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoProcesado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhFrascoProcesado entity.
     *
     * @Route("/{id}/edit", name="blhfrascoprocesado_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoProcesado entity.');
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
    * Creates a form to edit a BlhFrascoProcesado entity.
    *
    * @param BlhFrascoProcesado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhFrascoProcesado $entity)
    {
        $form = $this->createForm(new BlhFrascoProcesadoType(), $entity, array(
            'action' => $this->generateUrl('blhfrascoprocesado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhFrascoProcesado entity.
     *
     * @Route("/{id}", name="blhfrascoprocesado_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhFrascoProcesado:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoProcesado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascoprocesado_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhFrascoProcesado entity.
     *
     * @Route("/{id}", name="blhfrascoprocesado_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhFrascoProcesado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhfrascoprocesado'));
    }

    /**
     * Creates a form to delete a BlhFrascoProcesado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhfrascoprocesado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
