<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhAcidez;
use siblh\mantenimientoBundle\Form\BlhAcidezType;

/**
 * BlhAcidez controller.
 *
 * @Route("/blhacidez")
 */
class BlhAcidezController extends Controller
{

    /**
     * Lists all BlhAcidez entities.
     *
     * @Route("/", name="blhacidez")
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
        
     
        $query2 = $em->createQuery("SELECT a.id, a.factor, a.resultado, fr.codigoFrascoRecolectado as codigo FROM siblhmantenimientoBundle:BlhAcidez a join a.idFrascoRecolectado fr WHERE (substring (fr.codigoFrascoRecolectado, 1, 2) = '$idp')");
        $entities = $query2 ->getResult(); 
        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
        );
    }
    /**
     * Creates a new BlhAcidez entity.
     *
     * @Route("/", name="blhacidez_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhAcidez:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhAcidez();
		$usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity->setUsuario($usuario);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhacidez_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhAcidez entity.
    *
    * @param BlhAcidez $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhAcidez $entity)
    {
        $form = $this->createForm(new BlhAcidezType(), $entity, array(
            'action' => $this->generateUrl('blhacidez_create'),
            'method' => 'POST',
        ));

       // $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhAcidez entity.
     *
     * @Route("/new/{id}", name="blhacidez_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT  f.codigoFrascoRecolectado,f.volumenRecolectado,f.onzRecolectado,d.primerNombre as nombre1,d.segundoNombre as nombre2,d.primerApellido as apellido1,d.segundoApellido as apellido2, l.fechaAnalisisFisicoQuimico as fecha FROM siblhmantenimientoBundle:BlhFrascoRecolectado  f JOIN f.idDonante d JOIN f.idLoteAnalisis l   WHERE f.id = $id ");        
        $datos_frasco  = $query->getResult();
        	   $user_ID = $this->container->get('security.context')->getToken()->getUser()->getId();
         $frasco = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);
         
        $entity = new BlhAcidez();
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
			'user_ID' => $user_ID,
        );
    }


    /**
     * Finds and displays a BlhAcidez entity.
     *
     * @Route("/{id}", name="blhacidez_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAcidez')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAcidez entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

                 
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
     * Displays a form to edit an existing BlhAcidez entity.
     *
     * @Route("/{id}/edit", name="blhacidez_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
		$user_ID = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAcidez')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAcidez entity.');
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
			 'user_ID' => $user_ID,
        );
    }

    /**
    * Creates a form to edit a BlhAcidez entity.
    *
    * @param BlhAcidez $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhAcidez $entity)
    {
        $form = $this->createForm(new BlhAcidezType(), $entity, array(
            'action' => $this->generateUrl('blhacidez_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

       // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhAcidez entity.
     *
     * @Route("/{id}", name="blhacidez_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhAcidez:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhAcidez')->find($id);
		$usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity->setUsuario($usuario);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhAcidez entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhacidez_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhAcidez entity.
     *
     * @Route("/{id}", name="blhacidez_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhAcidez')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhAcidez entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhacidez'));
    }

    /**
     * Creates a form to delete a BlhAcidez entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhacidez_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
       /**
     * Lista de Frascos Recolectados entities.
     *
     * @Route("/frascos/analisisAcidez", name="blhfrascosAnalisis_acidez")
     * @Method("GET")
     * @Template()
     */
    public function frascosAnalisisAcidezAction()
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
        
      
       $query = $em->createQuery("SELECT f.id, f.codigoFrascoRecolectado,f.volumenRecolectado, f.onzRecolectado, f.formaExtraccion, f.observacionFrascoRecolectado FROM siblhmantenimientoBundle:BlhFrascoRecolectado f  WHERE f.idEstado = 7 AND f.idLoteAnalisis IS NOT NULL and (substring (f.codigoFrascoRecolectado, 1, 2) = '$idp')");
      $entities = $query->getResult(); 

        //$entities = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->findBy(array('idEstado' => 7));

        return array(
            'entities' => $entities,
             'hospital' => $establecimiento,
        );
    }
}