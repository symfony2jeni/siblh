<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhHistoriaActual;
use siblh\mantenimientoBundle\Form\BlhHistoriaActualType;

/**
 * BlhHistoriaActual controller.
 *
 * @Route("/blhhistoriaactual")
 */
class BlhHistoriaActualController extends Controller
{

    /**
     * Lists all BlhHistoriaActual entities.
     *
     * @Route("/", name="blhhistoriaactual")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        
 $entities = $em->getRepository('siblhmantenimientoBundle:BlhHistoriaActual')->findAll();
         //Obtener banco de leche//              
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
       $establecimiento = $query1->getResult(); 
       $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
       $id_blh = $queryb->getResult(); 
       $codigo=$id_blh[0]['id']; 
        
      $query = $em->createQuery("SELECT ha.id, d.codigoDonante as codigo_donante, d.primerNombre as nombre1, d.segundoNombre as nombre2, 
            d.primerApellido as apellido1, d.segundoApellido as apellido2,
            ha.pesoDonante, ha.tallaDonante, ha.medicamento , ha.habitoToxico,
            ha.motivoDonacion, ha.patologiaDonante, ha.imc, ha.estadoDonante
       FROM siblhmantenimientoBundle:BlhHistoriaActual ha join ha.idDonante d where 
       d.idBancoDeLeche = $codigo");
       $donantes_registradas  = $query->getResult(); 
        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
            'donantes_registradas' =>  $donantes_registradas, 
        );
    }
    /**
     * Creates a new BlhHistoriaActual entity.
     *
     * @Route("/", name="blhhistoriaactual_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhHistoriaActual:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhHistoriaActual();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
            $entity->setUsuario($usuario);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhhistoriaactual_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhHistoriaActual entity.
    *
    * @param BlhHistoriaActual $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhHistoriaActual $entity)
    {
        $form = $this->createForm(new BlhHistoriaActualType(), $entity, array(
            'action' => $this->generateUrl('blhhistoriaactual_create'),
            'method' => 'POST',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

  
    /**
     * Finds and displays a BlhHistoriaActual entity.
     *
     * @Route("/{id}", name="blhhistoriaactual_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistoriaActual')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhHistoriaActual entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'hospital' => $establecimiento,
        );
    }

    /**
     * Displays a form to edit an existing BlhHistoriaActual entity.
     *
     * @Route("/{id}/edit", name="blhhistoriaactual_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
         //Obtener banco de leche//
            
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistoriaActual')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhHistoriaActual entity.');
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
    * Creates a form to edit a BlhHistoriaActual entity.
    *
    * @param BlhHistoriaActual $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhHistoriaActual $entity)
    {
        $form = $this->createForm(new BlhHistoriaActualType(), $entity, array(
            'action' => $this->generateUrl('blhhistoriaactual_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

       // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhHistoriaActual entity.
     *
     * @Route("/{id}", name="blhhistoriaactual_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhHistoriaActual:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistoriaActual')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhHistoriaActual entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity->setUsuario($usuario);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhhistoriaactual_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhHistoriaActual entity.
     *
     * @Route("/{id}", name="blhhistoriaactual_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhHistoriaActual')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhHistoriaActual entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhhistoriaactual'));
    }

    /**
     * Creates a form to delete a BlhHistoriaActual entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhhistoriaactual_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    //Creando nuevo controlador
    
     //Creando Nuevos Controladores
     
     
    /**
     * Lists all BlhHistorialClinico entity.
     *
     * @Route("/donantesHA", name="blhhistoriaactual_donantesHA")
     * @Method("GET")
     * @Template()
     */
    
     public function donantesHAAction()
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
            where p.id not in (select don.id from siblhmantenimientoBundle:BlhHistoriaActual ha 
JOIN ha.idDonante don) and p.idBancoDeLeche = $codigo");
        
       //echo $hisclinico[idDonante];
                
        $donantes_registradas  = $query->getResult();
        //Obtener banco de leche//
   
        return array(
            'donantes_registradas' =>  $donantes_registradas, 
            'hospital' => $establecimiento,
           
        );
        
    }
   
   /**
     * Displays a form to create a new BlhHistoriaActual entity.
     *
     * @Route("/new/{id}", name="blhhistoriaactual_new")
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
        
        $entity = new BlhHistoriaActual();
        $entity->setIdDonante($donante);
        $form   = $this->createCreateForm($entity);

        //Obtener banco de leche//
              
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'datos_donantes' =>  $datos_donantes, 
            'hospital' => $establecimiento,
        );
    }


}