<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhAnalisisSensorial;
use siblh\mantenimientoBundle\Form\BlhAnalisisSensorialType;

/**
 * BlhAnalisisSensorial controller.
 *
 * @Route("/blhanalisissensorial")
 */
class BlhAnalisisSensorialController extends Controller
{

    /**
     * Lists all BlhAnalisisSensorial entities.
     *
     * @Route("/", name="blhanalisissensorial")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

  
       
         //Obtener banco de leche//
              
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult();  
         
         //codigo
        $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $queryb->getResult(); 
        $codigo=$id_blh[0]['id'];
        
          if ($codigo<10){
        $idp='0'.$codigo;
        $idp = (string)$idp;
         }
        else{$idp = (string)$codigo;}
        
        
         // $entities = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisSensorial')->findAll();
        $query2 = $em->createQuery("SELECT s.id, s.color, s.flavor, s.suciedad, s.embalaje, s.observacion, fr.codigoFrascoRecolectado as codigo FROM siblhmantenimientoBundle:BlhAnalisisSensorial s join s.idFrascoRecolectado fr WHERE (substring (fr.codigoFrascoRecolectado, 1, 2) = '$idp')");
        $entities = $query2 ->getResult(); 
        
        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
        );
    }
    /**
     * Creates a new BlhAnalisisSensorial entity.
     *
     * @Route("/", name="blhanalisissensorial_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhAnalisisSensorial:new.html.twig")
     */
    public function createAction(Request $request)
    {
          //Actualizando el volumen del frasco recolectado
         //$request = $this->getRequest();
         //$idrecibido = $request->get('idfrasco');//obteniendo id de frasco a modificar volumen
        // $id = (int)$idrecibido;
         //$id= explode("",$idrecibido );//transformando string recibido en un array
         /* $frasco = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);
          $volumen = $frasco[0]['volumenRecolectado'];
          echo $idrecibido;
          $nuevovolumen=volumen-3;
          $frasco->setVolumenRecolectado($nuevovolumen);
          $em->persist($frasco);
          $em->flush();*/
        
        $entity = new BlhAnalisisSensorial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
            $entity->setUsuario($usuario);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhanalisissensorial_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhAnalisisSensorial entity.
    *
    * @param BlhAnalisisSensorial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhAnalisisSensorial $entity)
    {
        $form = $this->createForm(new BlhAnalisisSensorialType(), $entity, array(
            'action' => $this->generateUrl('blhanalisissensorial_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhAnalisisSensorial entity.
     *
     * @Route("/new/{id}", name="blhanalisissensorial_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
         $query = $em->createQuery("SELECT  f.codigoFrascoRecolectado,f.volumenRecolectado,f.onzRecolectado,d.primerNombre as nombre1,d.segundoNombre as nombre2,d.primerApellido as apellido1,d.segundoApellido as apellido2, l.fechaAnalisisFisicoQuimico as fecha FROM siblhmantenimientoBundle:BlhFrascoRecolectado  f JOIN f.idDonante d JOIN f.idLoteAnalisis l   WHERE f.id = $id "); 
        
        $datos_frasco  = $query->getResult();
        
        $frasco = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);
   
        
        $entity = new BlhAnalisisSensorial();
        $entity->setidFrascoRecolectado($frasco);
        $form   = $this->createCreateForm($entity);
        //Obtener banco de leche//
              
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 

        return array(
            'datos_frasco'  => $datos_frasco,
            'entity' => $entity,
            'form'   => $form->createView(),
            'hospital' => $establecimiento,
            //'id'=>$id,
        );
    }

    /**
     * Finds and displays a BlhAnalisisSensorial entity.
     *
     * @Route("/{id}", name="blhanalisissensorial_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisSensorial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAnalisisSensorial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
         //Obtener banco de leche//
              
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'hospital' => $establecimiento,
        );
    }

    /**
     * Displays a form to edit an existing BlhAnalisisSensorial entity.
     *
     * @Route("/{id}/edit", name="blhanalisissensorial_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisSensorial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAnalisisSensorial entity.');
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
    * Creates a form to edit a BlhAnalisisSensorial entity.
    *
    * @param BlhAnalisisSensorial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhAnalisisSensorial $entity)
    {
        $form = $this->createForm(new BlhAnalisisSensorialType(), $entity, array(
            'action' => $this->generateUrl('blhanalisissensorial_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhAnalisisSensorial entity.
     *
     * @Route("/{id}", name="blhanalisissensorial_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhAnalisisSensorial:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisSensorial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAnalisisSensorial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
            $entity->setUsuario($usuario);
            $em->flush();

            return $this->redirect($this->generateUrl('blhanalisissensorial_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhAnalisisSensorial entity.
     *
     * @Route("/{id}", name="blhanalisissensorial_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhAnalisisSensorial')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhAnalisisSensorial entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhanalisissensorial'));
    }

    /**
     * Creates a form to delete a BlhAnalisisSensorial entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhanalisissensorial_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    /**
     * Lista de Frascos Recolectados entities.
     *
     * @Route("/frascos/analisisSensorial", name="blhfrascosAnalisis_sensorial")
     * @Method("GET")
     * @Template()
     */
    public function frascosAnalisisSensorialAction()
    {
        $em = $this->getDoctrine()->getManager();
        
         //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      //codigo
        $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $queryb->getResult(); 
        $codigo=$id_blh[0]['id'];
        
          if ($codigo<10){
        $idp='0'.$codigo;
        $idp = (string)$idp;
         }
        else{$idp = (string)$codigo;}
        
      $query = $em->createQuery("SELECT f.id, f.codigoFrascoRecolectado,f.volumenRecolectado, f.onzRecolectado, f.formaExtraccion, f.observacionFrascoRecolectado FROM siblhmantenimientoBundle:BlhFrascoRecolectado f  WHERE f.idEstado = 1 AND f.idLoteAnalisis IS NOT NULL and (substring (f.codigoFrascoRecolectado, 1, 2) = '$idp')");
      $entities = $query->getResult(); 
       

        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
        );
    }
    
   
}