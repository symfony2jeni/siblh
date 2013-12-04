<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhTemperaturaPasteurizacion;
use siblh\mantenimientoBundle\Form\BlhTemperaturaPasteurizacionType;
//use Symfony\Component\Validator\Constraints as Assert;

/**
 * BlhTemperaturaPasteurizacion controller.
 *
 * @Route("/blhtemperaturapasteurizacion")
 */
class BlhTemperaturaPasteurizacionController extends Controller
{

    /**
     * Lists all BlhTemperaturaPasteurizacion entities.
     *
     * @Route("/", name="blhtemperaturapasteurizacion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaPasteurizacion')->findAll();
        //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $queryb->getResult(); 
      $codigo=$id_blh[0]['id']; 
         if ($codigo<10){
        $idp='0'.$codigo;
        $idp = (string)$idp; //convirtiendo a string para compararlo con un string
         }
        else{$idp = (string)$codigo;}
      
       $query = $em->createQuery("SELECT p.id, p.codigoPasteurizacion,p.fechaPasteurizacion, p.responsablePasteurizacion,
                                  t.temperaturaP FROM siblhmantenimientoBundle:BlhTemperaturaPasteurizacion t join t.idPasteurizacion p
                                   where substring(p.codigoPasteurizacion,1,2) =  '$idp'");
               
       $pasteurizaciones_index = $query->getResult(); 
        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
            'pasteurizaciones_index'=> $pasteurizaciones_index
        );
    }
    /**
     * Creates a new BlhTemperaturaPasteurizacion entity.
     *
     * @Route("/", name="blhtemperaturapasteurizacion_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhTemperaturaPasteurizacion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhTemperaturaPasteurizacion();
       $form = $this->createCreateForm($entity); 
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhtemperaturapasteurizacion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhTemperaturaPasteurizacion entity.
    *
    * @param BlhTemperaturaPasteurizacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhTemperaturaPasteurizacion $entity)
    {
        $form = $this->createForm(new BlhTemperaturaPasteurizacionType(), $entity, array(
            'action' => $this->generateUrl('blhtemperaturapasteurizacion_create'),
            'method' => 'POST',
        ));

     //   $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhTemperaturaPasteurizacion entity.
     *
     * @Route("/new", name="blhtemperaturapasteurizacion_new")
     * @Method("GET")
     * @Template()
     */
    /* public function newAction()
    {
        $entity = new BlhTemperaturaPasteurizacion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    } */


    /**
     * Finds and displays a BlhTemperaturaPasteurizacion entity.
     *
     * @Route("/{id}", name="blhtemperaturapasteurizacion_show")
     * @Method("GET")
     * @Template()
     */
     public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaPasteurizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhTemperaturaPasteurizacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhTemperaturaPasteurizacion entity.
     *
     * @Route("/{id}/edit", name="blhtemperaturapasteurizacion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaPasteurizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhTemperaturaPasteurizacion entity.');
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
    * Creates a form to edit a BlhTemperaturaPasteurizacion entity.
    *
    * @param BlhTemperaturaPasteurizacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhTemperaturaPasteurizacion $entity)
    {
        $form = $this->createForm(new BlhTemperaturaPasteurizacionType(), $entity, array(
            'action' => $this->generateUrl('blhtemperaturapasteurizacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

       // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhTemperaturaPasteurizacion entity.
     *
     * @Route("/{id}", name="blhtemperaturapasteurizacion_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhTemperaturaPasteurizacion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaPasteurizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhTemperaturaPasteurizacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhtemperaturapasteurizacion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhTemperaturaPasteurizacion entity.
     *
     * @Route("/{id}", name="blhtemperaturapasteurizacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhTemperaturaPasteurizacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhTemperaturaPasteurizacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhtemperaturapasteurizacion'));
    }

    
    
    /**
     * Creates a form to delete a BlhTemperaturaPasteurizacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhtemperaturapasteurizacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            //->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

  
    //Creando nuevo controlador
    
     //Creando Nuevos Controladores
     
     
    /**
     * Lists all BlhFrascoRecolectado entities.
     *
     * @Route("/pasteurizacionP", name="blhtemppasteurizacion")
     * @Method("GET")
     * @Template()
     */
 
 public function pasteurizacionesAction()
    {
        $em = $this->getDoctrine()->getManager();      
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $queryb->getResult(); 
        $codigo=$id_blh[0]['id']; 
         if ($codigo<10){
        $idp='0'.$codigo;
        $idp = (string)$idp;
         }
        else{$idp = (string)$codigo;}
        //Obteniendo lista de pasteurizaciones  
        $query = $em->createQuery("SELECT r.id, r.codigoPasteurizacion,r.fechaPasteurizacion, r.responsablePasteurizacion FROM siblhmantenimientoBundle:BlhPasteurizacion r
                                   where substring(r.codigoPasteurizacion,1,2) = '$idp'");
        //Obtengo resultado y lo guardo
        $pasteurizaciones_frascos  = $query->getResult();
     
        return array(
            'pasteurizaciones_frascos' =>  $pasteurizaciones_frascos,
            'hospital' => $establecimiento,
        );
        
    }
    
    
     /**
     * Displays a form to create a new BlhFrascoRecolectado entity.
     *
     * @Route("/new/{id}", name="blhtemperaturapasteurizacion_new")
     * @Method("GET")
     * @Template()
     */
      public function newAction($id)
    {
         $em = $this->getDoctrine()->getManager();
        
         $query = $em->createQuery("SELECT r.id , r.codigoPasteurizacion, r.fechaPasteurizacion, r.horaInicioP, r.horaFinalP FROM siblhmantenimientoBundle:BlhPasteurizacion r WHERE r.id = $id "); 
         $pasteurizaciones_frascos  = $query->getResult(); 
 //Obteniendo los datos que necesito presentar en mi entrada donde el id de pasteurizacion que seleccione de listado 
 //sea igual al id del regitro de la tabla a mostrar
         $query2 = $em->createQuery("SELECT r.temperaturaP FROM siblhmantenimientoBundle:BlhTemperaturaPasteurizacion r  join r.idPasteurizacion p WHERE p.id = $id "); 
         $temperaturas  = $query2->getResult();
         
         $pasteurizacion = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->find($id); 
 //Capturando id    
       
        if (!$pasteurizaciones_frascos) {
            throw $this->createNotFoundException('Unable to find BlhTemperaturaP entity');
        }
        
        //Creando la entidad 
        $entity = new BlhTemperaturaPasteurizacion(); 
        $entity->setidPasteurizacion($pasteurizacion); 
//establecer que el idPasteurizacion de la  tabla temperaturaP sea igual al id obtenido 
//que se encuentra en la variable $pasteurizcion.
        
        
        $form   = $this->createCreateForm($entity);  
         //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 

        return array(   
            'entity' => $entity,
            'form'   => $form->createView(),
            'temperaturas' =>  $temperaturas, 
            'pasteurizaciones_frascos' =>  $pasteurizaciones_frascos,
            'hospital' => $establecimiento,
            
        ); 
    }
}
