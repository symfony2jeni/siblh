<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhCrematocrito;
use siblh\mantenimientoBundle\Form\BlhCrematocritoType;

/**
 * BlhCrematocrito controller.
 *
 * @Route("/blhcrematocrito")
 */
class BlhCrematocritoController extends Controller
{

    /**
     * Lists all BlhCrematocrito entities.
     *
     * @Route("/", name="blhcrematocrito")
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
        
    
     
        $query2 = $em->createQuery("SELECT c.id, c.mediaCrema, c.mediaCt, c.porcentajeCrema,c.kilocalorias,  fr.codigoFrascoRecolectado as codigo FROM siblhmantenimientoBundle:BlhCrematocrito c join c.idFrascoRecolectado fr WHERE (substring (fr.codigoFrascoRecolectado, 1, 2) = '$idp')");
        $entities = $query2 ->getResult(); 
        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
        );
    }
    /**
     * Creates a new BlhCrematocrito entity.
     *
     * @Route("/", name="blhcrematocrito_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhCrematocrito:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhCrematocrito();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
            $entity->setUsuario($usuario);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhcrematocrito_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhCrematocrito entity.
    *
    * @param BlhCrematocrito $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhCrematocrito $entity)
    {
        $form = $this->createForm(new BlhCrematocritoType(), $entity, array(
            'action' => $this->generateUrl('blhcrematocrito_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhCrematocrito entity.
     *
     * @Route("/new/{id}", name="blhcrematocrito_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT  f.codigoFrascoRecolectado,f.volumenRecolectado,f.onzRecolectado,d.primerNombre as nombre1,d.segundoNombre as nombre2,d.primerApellido as apellido1,d.segundoApellido as apellido2, l.fechaAnalisisFisicoQuimico as fecha FROM siblhmantenimientoBundle:BlhFrascoRecolectado  f JOIN f.idDonante d JOIN f.idLoteAnalisis l   WHERE f.id = $id ");        
        $datos_frasco  = $query->getResult();
        
        $frasco = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($id);
        $entity = new BlhCrematocrito();
        $entity->setidFrascoRecolectado($frasco);
        $form   = $this->createCreateForm($entity);
         //Obtener banco de leche//
              
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        return array(
            'datos_frasco'  => $datos_frasco,
            'entity' => $entity,
            'form'   => $form->createView(),
            'hospital' => $establecimiento,
        );
    }

    /**
     * Finds and displays a BlhCrematocrito entity.
     *
     * @Route("/{id}", name="blhcrematocrito_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhCrematocrito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhCrematocrito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'hospital' => $establecimiento,
        );
    }

    /**
     * Displays a form to edit an existing BlhCrematocrito entity.
     *
     * @Route("/{id}/edit", name="blhcrematocrito_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhCrematocrito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhCrematocrito entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
         //Obtener banco de leche//
              
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
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
    * Creates a form to edit a BlhCrematocrito entity.
    *
    * @param BlhCrematocrito $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhCrematocrito $entity)
    {
        $form = $this->createForm(new BlhCrematocritoType(), $entity, array(
            'action' => $this->generateUrl('blhcrematocrito_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhCrematocrito entity.
     *
     * @Route("/{id}", name="blhcrematocrito_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhCrematocrito:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhCrematocrito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhCrematocrito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
            $entity->setUsuario($usuario);
            $em->flush();

            return $this->redirect($this->generateUrl('blhcrematocrito_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhCrematocrito entity.
     *
     * @Route("/{id}", name="blhcrematocrito_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhCrematocrito')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhCrematocrito entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhcrematocrito'));
    }

    /**
     * Creates a form to delete a BlhCrematocrito entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhcrematocrito_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
           /**
     * Lista de Frascos Recolectados entities.
     *
     * @Route("/frascos/analisisCrematocrito", name="blhfrascosAnalisis_crematocrito")
     * @Method("GET")
     * @Template()
     */
    public function frascosAnalisisCrematocritoAction()
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
        

      $query = $em->createQuery("SELECT f.id, f.codigoFrascoRecolectado,f.volumenRecolectado, f.onzRecolectado, f.formaExtraccion, f.observacionFrascoRecolectado FROM siblhmantenimientoBundle:BlhFrascoRecolectado f  WHERE f.idEstado = 5 AND f.idLoteAnalisis IS NOT NULL and (substring (f.codigoFrascoRecolectado, 1, 2) = '$idp')");
      $entities = $query->getResult(); 

        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
        );
    }
    
}