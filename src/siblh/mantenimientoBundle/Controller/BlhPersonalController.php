<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhPersonal;
use siblh\mantenimientoBundle\Form\BlhPersonalType;

/**
 * BlhPersonal controller.
 *
 * @Route("/blhpersonal")
 */
class BlhPersonalController extends Controller
{

    /**
     * Lists all BlhPersonal entities.
     *
     * @Route("/", name="blhpersonal")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhPersonal')->findAll();
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 

        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
        );
    }
    /**
     * Creates a new BlhPersonal entity.
     *
     * @Route("/", name="blhpersonal_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhPersonal:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhPersonal();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhpersonal_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhPersonal entity.
    *
    * @param BlhPersonal $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhPersonal $entity)
    {
        $form = $this->createForm(new BlhPersonalType(), $entity, array(
            'action' => $this->generateUrl('blhpersonal_create'),
            'method' => 'POST',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhPersonal entity.
     *
     * @Route("/new", name="blhpersonal_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
     
        
        $em = $this->getDoctrine()->getManager();
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.id, e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        
        $est = $em->getRepository('siblhmantenimientoBundle:CtlEstablecimiento')->find($userEst);
        
           
           $entity = new BlhPersonal();
           $entity->setIdEstablecimiento($est);
           $form   = $this->createCreateForm($entity);
        return array(
            'entity' => $entity,
            'hospital' => $establecimiento,
            'form'   => $form->createView(),
            
        );
    }

    /**
     * Finds and displays a BlhPersonal entity.
     *
     * @Route("/{id}", name="blhpersonal_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhPersonal')->find($id);
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.id, e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhPersonal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'hospital' => $establecimiento,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhPersonal entity.
     *
     * @Route("/{id}/edit", name="blhpersonal_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhPersonal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhPersonal entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
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
    * Creates a form to edit a BlhPersonal entity.
    *
    * @param BlhPersonal $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhPersonal $entity)
    {
        $form = $this->createForm(new BlhPersonalType(), $entity, array(
            'action' => $this->generateUrl('blhpersonal_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhPersonal entity.
     *
     * @Route("/{id}", name="blhpersonal_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhPersonal:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhPersonal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhPersonal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhpersonal_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhPersonal entity.
     *
     * @Route("/{id}", name="blhpersonal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhPersonal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhPersonal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhpersonal'));
    }

    /**
     * Creates a form to delete a BlhPersonal entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhpersonal_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
