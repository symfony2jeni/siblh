<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhTemperaturaPasteurizacion;
use siblh\mantenimientoBundle\Form\BlhTemperaturaPasteurizacionType;

/**
 * BlhTemperaturaPasteurizacion controller.
 *
 * @Route("/blhtemperaturapasteurizacion")
 */
class BlhTemperaturaPasteurizacionController extends Controller
{

    /**
     * Lists all BlhTemperaturaPasteurizacion entities.
     *
     * @Route("/", name="blhtemperaturapasteurizacion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaPasteurizacion')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhTemperaturaPasteurizacion entity.
     *
     * @Route("/", name="blhtemperaturapasteurizacion_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhTemperaturaPasteurizacion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhTemperaturaPasteurizacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhtemperaturapasteurizacion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhTemperaturaPasteurizacion entity.
    *
    * @param BlhTemperaturaPasteurizacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhTemperaturaPasteurizacion $entity)
    {
        $form = $this->createForm(new BlhTemperaturaPasteurizacionType(), $entity, array(
            'action' => $this->generateUrl('blhtemperaturapasteurizacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhTemperaturaPasteurizacion entity.
     *
     * @Route("/new", name="blhtemperaturapasteurizacion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhTemperaturaPasteurizacion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhTemperaturaPasteurizacion entity.
     *
     * @Route("/{id}", name="blhtemperaturapasteurizacion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaPasteurizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhTemperaturaPasteurizacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhTemperaturaPasteurizacion entity.
     *
     * @Route("/{id}/edit", name="blhtemperaturapasteurizacion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaPasteurizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhTemperaturaPasteurizacion entity.');
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
    * Creates a form to edit a BlhTemperaturaPasteurizacion entity.
    *
    * @param BlhTemperaturaPasteurizacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhTemperaturaPasteurizacion $entity)
    {
        $form = $this->createForm(new BlhTemperaturaPasteurizacionType(), $entity, array(
            'action' => $this->generateUrl('blhtemperaturapasteurizacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhTemperaturaPasteurizacion entity.
     *
     * @Route("/{id}", name="blhtemperaturapasteurizacion_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhTemperaturaPasteurizacion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaPasteurizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhTemperaturaPasteurizacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhtemperaturapasteurizacion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhTemperaturaPasteurizacion entity.
     *
     * @Route("/{id}", name="blhtemperaturapasteurizacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaPasteurizacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhTemperaturaPasteurizacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhtemperaturapasteurizacion'));
    }

    /**
     * Creates a form to delete a BlhTemperaturaPasteurizacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhtemperaturapasteurizacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
