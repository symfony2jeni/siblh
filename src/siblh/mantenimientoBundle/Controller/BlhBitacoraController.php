<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhBitacora;
use siblh\mantenimientoBundle\Form\BlhBitacoraType;

/**
 * BlhBitacora controller.
 *
 * @Route("/blhbitacora")
 */
class BlhBitacoraController extends Controller
{

  
    /**
     * Displays a form to edit an existing BlhBitacora entity.
     *
     * @Route("/", name="blhbitacora")
     * @Method("POST")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
     
        $tipoBusqueda = $request->get('opcionSeleccionada');
        $nombreUsuario = $request->get('nombreUser');
        $fechaInicio= $request->get('fechai');
        $fechaFin = $request->get('fechaf');
        
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();      
        $queryEstablecimiento = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $queryEstablecimiento->getResult(); 
        if ($tipoBusqueda == 1)
        {
            $query1 = $em->createQuery("SELECT e.id, e.fechaAccion,e.codigo,e.tabla,e.usuario,e.accion,e.detalle FROM siblhmantenimientoBundle:BlhBitacora e WHERE e.usuario ='$nombreUsuario'");
            $entities = $query1->getResult();
  
        }
 
        if ($tipoBusqueda == 2)
        {
            $query1 = $em->createQuery("SELECT e.id, e.fechaAccion,e.codigo,e.tabla,e.usuario,e.accion,e.detalle FROM siblhmantenimientoBundle:BlhBitacora e WHERE e.fechaAccion >='$fechaInicio' and e.fechaAccion <='$fechaFin'");
            $entities = $query1->getResult();
  
        }
       
       
  
                 return array(
                     'entities' => $entities,
                     'hospital' => $establecimiento,
        );
        /*return array(
            'entities' => $entities,
        );*/
        
    }
    /**
     * Creates a new BlhBitacora entity.
     *
     * @Route("/", name="blhbitacora_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhBitacora:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhBitacora();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhbitacora_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhBitacora entity.
    *
    * @param BlhBitacora $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhBitacora $entity)
    {
        $form = $this->createForm(new BlhBitacoraType(), $entity, array(
            'action' => $this->generateUrl('blhbitacora_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhBitacora entity.
     *
     * @Route("/new", name="blhbitacora_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhBitacora();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhBitacora entity.
     *
     * @Route("/{id}", name="blhbitacora_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhBitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhBitacora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhBitacora entity.
     *
     * @Route("/{id}/edit", name="blhbitacora_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhBitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhBitacora entity.');
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
    * Creates a form to edit a BlhBitacora entity.
    *
    * @param BlhBitacora $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhBitacora $entity)
    {
        $form = $this->createForm(new BlhBitacoraType(), $entity, array(
            'action' => $this->generateUrl('blhbitacora_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhBitacora entity.
     *
     * @Route("/{id}", name="blhbitacora_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhBitacora:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhBitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhBitacora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhbitacora_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhBitacora entity.
     *
     * @Route("/{id}", name="blhbitacora_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhBitacora')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhBitacora entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhbitacora'));
    }

    
    
    
              
/**
     * @Route("/busqueda/",name="BusquedaBitacora")
     * @Template("siblhmantenimientoBundle:BlhBitacora:BusquedaBitacora.html.twig")
     */
    public function BusquedaBitacoraAction()
            
             {
         
       $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $codigo=$id_blh[0]['id']; 
          if ($codigo<10){
        $id='0'.$codigo;}
        else{$id = strval($codigo);}
      
        return array('hospital' => $establecimiento,
                     'id' => $id
                );
          }  

    
    
    
    
    
    
    /**
     * Creates a form to delete a BlhBitacora entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhbitacora_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
