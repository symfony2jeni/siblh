<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhFrascoProcesado;
use siblh\mantenimientoBundle\Form\BlhFrascoProcesadoType;

/**
 * BlhFrascoProcesado controller.
 *
 * @Route("/blhfrascoprocesado")
 */
class BlhFrascoProcesadoController extends Controller
{

    /**
     * Lists all BlhFrascoProcesado entities.
     *
     * @Route("/", name="blhfrascoprocesado")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->findAll();
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
     * Creates a new BlhFrascoProcesado entity.
     *
     * @Route("/", name="blhfrascoprocesado_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhFrascoProcesado:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhFrascoProcesado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascoprocesado_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhFrascoProcesado entity.
    *
    * @param BlhFrascoProcesado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhFrascoProcesado $entity)
    {
        $form = $this->createForm(new BlhFrascoProcesadoType(), $entity, array(
            'action' => $this->generateUrl('blhfrascoprocesado_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

   

    /**
     * Finds and displays a BlhFrascoProcesado entity.
     *
     * @Route("/{id}", name="blhfrascoprocesado_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoProcesado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhFrascoProcesado entity.
     *
     * @Route("/{id}/edit", name="blhfrascoprocesado_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoProcesado entity.');
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
    * Creates a form to edit a BlhFrascoProcesado entity.
    *
    * @param BlhFrascoProcesado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhFrascoProcesado $entity)
    {
        $form = $this->createForm(new BlhFrascoProcesadoType(), $entity, array(
            'action' => $this->generateUrl('blhfrascoprocesado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhFrascoProcesado entity.
     *
     * @Route("/{id}", name="blhfrascoprocesado_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhFrascoProcesado:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoProcesado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascoprocesado_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhFrascoProcesado entity.
     *
     * @Route("/{id}", name="blhfrascoprocesado_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhFrascoProcesado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhfrascoprocesado'));
    }

    /**
     * Creates a form to delete a BlhFrascoProcesado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhfrascoprocesado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
      /**
     * Lista de todos los Receptores Registrados.
     *
     * @Route("/seleccion/pasteurizacion", name="sleccion_pasteurizacion")
     * @Method("GET")
     * @Template()
     */
 
 public function seleccionPasteurizacionAction()
    {
        $em = $this->getDoctrine()->getManager();   
        
        
         //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
        
       //Obteniendo las pasteurizaciones a las que aun no se les ha combinado frascos procesados
       
       $query = $em->createQuery("SELECT p.id, p.codigoPasteurizacion, p.numCiclo, p.volumenPasteurizado,p.numFrascosPasteurizados, p.fechaPasteurizacion, p.responsablePasteurizacion FROM siblhmantenimientoBundle:BlhPasteurizacion p where p.id not in (select f.id  from siblhmantenimientoBundle:BlhFrascoProcesado f JOIN f.idPasteurizacion pas)");
        
         $pasteurizaciones = $query->getResult();
     
       
        return array(
            'pasteurizaciones' => $pasteurizaciones,         
            'hospital' => $establecimiento,
        );
        
    }
    
     /**
     * Displays a form to create a new BlhFrascoProcesado entity.
     *
     * @Route("/new/{id}", name="blhfrascoprocesado_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {

//Obtener banco de leche//
        $em = $this->getDoctrine()->getManager();       
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
     
      
        $pasteurizacion = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->find($id);
       
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        
        //Obtener los frascos a combinar
        
       $query = $em->createQuery("select fr.id, fr.codigoFrascoRecolectado, a.resultado  from siblhmantenimientoBundle:BlhAcidez a join a.idFrascoRecolectado fr  where fr.idEstado = 6");
        $frascos_combinar = $query->getResult(); 
       //$Acidez = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        //$frascos_combinar = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->findBy(array('idEstado' => 6));
        
        $entity = new BlhFrascoProcesado();
        $entity->setIdPasteurizacion($pasteurizacion);
        $form   = $this->createCreateForm($entity);
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'hospital' => $establecimiento,
            'frascos_combinar'=> $frascos_combinar,
            'pasteurizacion'=> $pasteurizacion,
        );
    }
}

