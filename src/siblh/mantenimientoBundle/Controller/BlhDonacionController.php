<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhDonacion;
use siblh\mantenimientoBundle\Form\BlhDonacionType;

/**
 * BlhDonacion controller.
 *
 * @Route("/blhdonacion")
 */
class BlhDonacionController extends Controller
{

    /**
     * Lists all BlhDonacion entities.
     *
     * @Route("/", name="blhdonacion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhDonacion')->findAll();
   //Obtener banco de leche//              
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 
       $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
       $id_blh = $queryb->getResult(); 
       $codigo=$id_blh[0]['id']; 
       $query = $em->createQuery("SELECT do.id, d.codigoDonante as codigo_donante, d.primerNombre as nombre1, d.segundoNombre as nombre2, 
            d.primerApellido as apellido1, d.segundoApellido as apellido2,
            do.fechaDonacion, do.responsableDonacion
       FROM siblhmantenimientoBundle:BlhDonacion do join do.idDonante d where 
       d.idBancoDeLeche = $codigo");
       $donaciones  = $query->getResult(); 
        return array(
            'entities' => $entities,
             'donaciones' =>  $donaciones, 
             'hospital' => $establecimiento,
        );
    }
    /**
     * Creates a new BlhDonacion entity.
     *
     * @Route("/", name="blhdonacion_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhDonacion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhDonacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhdonacion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhDonacion entity.
    *
    * @param BlhDonacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhDonacion $entity)
    {
        $form = $this->createForm(new BlhDonacionType(), $entity, array(
            'action' => $this->generateUrl('blhdonacion_create'),
            'method' => 'POST',
        ));

   //     $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
    
    
     /**
     * Lists all BlhHistorialClinico entity.
     *
     * @Route("/donantesD", name="blhDonacion_donantesD")
     * @Method("GET")
     * @Template()
     */
    
     public function donantesDAction()
    {
        $em = $this->getDoctrine()->getManager(); 
                   
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 
       $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
       $id_blh = $queryb->getResult(); 
       $codigo=$id_blh[0]['id']; 
        
        //Obteniendo lista de donantes"  
            $query = $em->createQuery("SELECT p.id as identificador, p.primerNombre as nombre1, p.segundoNombre as nombre2,
            p.primerApellido as apellido1, p.segundoApellido as apellido2 FROM siblhmantenimientoBundle:BlhDonante p 
            where p.idBancoDeLeche = $codigo");
        
       //echo $hisclinico[idDonante];
                
        $donantes_registradas  = $query->getResult();
        //Obtener banco de leche//
   
        return array(
            'donantes_registradas' =>  $donantes_registradas, 
            'hospital' => $establecimiento,
           
        );
        
    }
    

    /**
     * Displays a form to create a new BlhDonacion entity.
     *
     * @Route("/new/{id}", name="blhdonacion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
         $query = $em->createQuery("SELECT p.id as identificador, p.codigoDonante as codigo_donante, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.primerApellido as apellido1, p.segundoApellido as apellido2 FROM siblhmantenimientoBundle:BlhDonante p  WHERE p.id = $id "); 
        $datos_donantes  = $query->getResult();
        //   $donante = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($id);   
       $donante = $em->getRepository('siblhmantenimientoBundle:BlhDonante')->find($datos_donantes[0]['identificador']);
     
        if (!$datos_donantes) {
            throw $this->createNotFoundException('Unable to find BlhDonante entity');
        }

          //Obtener banco de leche//              
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 
       $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
       $id_blh = $queryb->getResult(); 
       $codigo=$id_blh[0]['id']; 
       $blh = $em->getRepository('siblhmantenimientoBundle:BlhBancoDeLeche')->find($codigo);
       $entity = new BlhDonacion();
       $entity->setIdBancoDeLeche($blh);
        $entity->setIdDonante($donante);
       $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'hospital' => $establecimiento,
            'datos_donantes' => $datos_donantes,
            );
    }

    /**
     * Finds and displays a BlhDonacion entity.
     *
     * @Route("/{id}", name="blhdonacion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
          //Obtener banco de leche//              
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhDonacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
                'hospital' => $establecimiento,
        );
    }

    /**
     * Displays a form to edit an existing BlhDonacion entity.
     *
     * @Route("/{id}/edit", name="blhdonacion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
         $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhDonacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
             'hospital' => $establecimiento,
        );
    }

    /**
    * Creates a form to edit a BlhDonacion entity.
    *
    * @param BlhDonacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhDonacion $entity)
    {
        $form = $this->createForm(new BlhDonacionType(), $entity, array(
            'action' => $this->generateUrl('blhdonacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

//        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhDonacion entity.
     *
     * @Route("/{id}", name="blhdonacion_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhDonacion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhDonacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhdonacion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhDonacion entity.
     *
     * @Route("/{id}", name="blhdonacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhDonacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhDonacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhdonacion'));
    }

    /**
     * Creates a form to delete a BlhDonacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhdonacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}