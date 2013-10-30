<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhAnalisisMicrobiologico;
use siblh\mantenimientoBundle\Form\BlhAnalisisMicrobiologicoType;

/**
 * BlhAnalisisMicrobiologico controller.
 *
 * @Route("/blhanalisismicrobiologico")
 */
class BlhAnalisisMicrobiologicoController extends Controller
{

    /**
     * Lists all BlhAnalisisMicrobiologico entities.
     *
     * @Route("/", name="blhanalisismicrobiologico")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisMicrobiologico')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlhAnalisisMicrobiologico entity.
     *
     * @Route("/", name="blhanalisismicrobiologico_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhAnalisisMicrobiologico:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhAnalisisMicrobiologico();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhanalisismicrobiologico_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhAnalisisMicrobiologico entity.
    *
    * @param BlhAnalisisMicrobiologico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhAnalisisMicrobiologico $entity)
    {
        $form = $this->createForm(new BlhAnalisisMicrobiologicoType(), $entity, array(
            'action' => $this->generateUrl('blhanalisismicrobiologico_create'),
            'method' => 'POST',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhAnalisisMicrobiologico entity.
     *
     * @Route("/new", name="blhanalisismicrobiologico_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhAnalisisMicrobiologico();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhAnalisisMicrobiologico entity.
     *
     * @Route("/{id}", name="blhanalisismicrobiologico_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisMicrobiologico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAnalisisMicrobiologico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhAnalisisMicrobiologico entity.
     *
     * @Route("/{id}/edit", name="blhanalisismicrobiologico_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisMicrobiologico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAnalisisMicrobiologico entity.');
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
    * Creates a form to edit a BlhAnalisisMicrobiologico entity.
    *
    * @param BlhAnalisisMicrobiologico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhAnalisisMicrobiologico $entity)
    {
        $form = $this->createForm(new BlhAnalisisMicrobiologicoType(), $entity, array(
            'action' => $this->generateUrl('blhanalisismicrobiologico_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhAnalisisMicrobiologico entity.
     *
     * @Route("/{id}", name="blhanalisismicrobiologico_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhAnalisisMicrobiologico:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisMicrobiologico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAnalisisMicrobiologico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhanalisismicrobiologico_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhAnalisisMicrobiologico entity.
     *
     * @Route("/{id}", name="blhanalisismicrobiologico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisMicrobiologico')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhAnalisisMicrobiologico entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhanalisismicrobiologico'));
    }

    /**
     * Creates a form to delete a BlhAnalisisMicrobiologico entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhanalisismicrobiologico_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
