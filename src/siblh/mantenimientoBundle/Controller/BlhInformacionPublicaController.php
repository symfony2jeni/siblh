<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhInformacionPublica;
use siblh\mantenimientoBundle\Form\BlhInformacionPublicaType;

/**
 * BlhInformacionPublica controller.
 *
 * @Route("/blhinformacionpublica")
 */
class BlhInformacionPublicaController extends Controller
{

    /**
     * Lists all BlhInformacionPublica entities.
     *
     * @Route("/", name="blhinformacionpublica")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('siblhmantenimientoBundle:BlhInformacionPublica')->findAll();
        //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
            
        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
        );
    }
    /**
     * Creates a new BlhInformacionPublica entity.
     *
     * @Route("/", name="blhinformacionpublica_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhInformacionPublica:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhInformacionPublica();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhinformacionpublica_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhInformacionPublica entity.
    *
    * @param BlhInformacionPublica $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhInformacionPublica $entity)
    {
        $form = $this->createForm(new BlhInformacionPublicaType(), $entity, array(
            'action' => $this->generateUrl('blhinformacionpublica_create'),
            'method' => 'POST',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhInformacionPublica entity.
     *
     * @Route("/new", name="blhinformacionpublica_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhInformacionPublica();
        $form   = $this->createCreateForm($entity);
         //Obtener banco de leche//
      $em = $this->getDoctrine()->getManager();   
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'hospital' => $establecimiento,
        );
    }

    /**
     * Finds and displays a BlhInformacionPublica entity.
     *
     * @Route("/{id}", name="blhinformacionpublica_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhInformacionPublica')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhInformacionPublica entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhInformacionPublica entity.
     *
     * @Route("/{id}/edit", name="blhinformacionpublica_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhInformacionPublica')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhInformacionPublica entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
         //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'hospital' => $establecimiento,
        );
    }

    /**
    * Creates a form to edit a BlhInformacionPublica entity.
    *
    * @param BlhInformacionPublica $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhInformacionPublica $entity)
    {
        $form = $this->createForm(new BlhInformacionPublicaType(), $entity, array(
            'action' => $this->generateUrl('blhinformacionpublica_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhInformacionPublica entity.
     *
     * @Route("/{id}", name="blhinformacionpublica_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhInformacionPublica:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhInformacionPublica')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhInformacionPublica entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhinformacionpublica_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhInformacionPublica entity.
     *
     * @Route("/{id}", name="blhinformacionpublica_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhInformacionPublica')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhInformacionPublica entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhinformacionpublica'));
    }

    /**
     * Creates a form to delete a BlhInformacionPublica entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhinformacionpublica_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
