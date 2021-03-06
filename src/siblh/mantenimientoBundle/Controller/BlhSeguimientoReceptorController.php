<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhSeguimientoReceptor;
use siblh\mantenimientoBundle\Form\BlhSeguimientoReceptorType;

use siblh\mantenimientoBundle\Entity\BlhReceptor;
/**
 * BlhSeguimientoReceptor controller.
 *
 * @Route("/blhseguimientoreceptor")
 */
class BlhSeguimientoReceptorController extends Controller
{

    /**
     * Lists all BlhSeguimientoReceptor entities.
     *
     * @Route("/", name="blhseguimientoreceptor")
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
        
                //$entities = $em->getRepository('siblhmantenimientoBundle:BlhSeguimientoReceptor')->findAll();
       $query = $em->createQuery("SELECT s.id,s.periodoEvaluacion,s.fechaSeguimiento,s.semana,s.tallaReceptor,s.gananciaDiaTalla,s.pesoSeguimiento,s.gananciaDiaPeso,s.pcSeguimiento,s.gananciaDiaPc,s.complicaciones,s.observacion,p.primerNombre as nombre1, p.segundoNombre as nombre2, p.tercerNombre as nombre3, p.primerApellido as apellido1, p.segundoApellido as apellido2 FROM siblhmantenimientoBundle:BlhSeguimientoReceptor s JOIN s.idReceptor r JOIN r.idPaciente p where (substring (r.codigoReceptor, 1, 2) = '$idp')");
        
        $entities  = $query->getResult();
        

        return array(
           
            'entities' => $entities,
            'hospital' => $establecimiento,
        );
    }
    /**
     * Creates a new BlhSeguimientoReceptor entity.
     *
     * @Route("/", name="blhseguimientoreceptor_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhSeguimientoReceptor:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhSeguimientoReceptor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
            $entity->setUsuario($usuario);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhseguimientoreceptor_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhSeguimientoReceptor entity.
    *
    * @param BlhSeguimientoReceptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhSeguimientoReceptor $entity)
    {
        $form = $this->createForm(new BlhSeguimientoReceptorType(), $entity, array(
            'action' => $this->generateUrl('blhseguimientoreceptor_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhSeguimientoReceptor entity.
     *
     * @Route("/new", name="blhseguimientoreceptor_new")
     * @Method("GET")
     * @Template()
     */
    /*public function newAction()
    {
        $entity = new BlhSeguimientoReceptor();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }*/

    /**
     * Finds and displays a BlhSeguimientoReceptor entity.
     *
     * @Route("/{id}", name="blhseguimientoreceptor_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhSeguimientoReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhSeguimientoReceptor entity.');
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
     * Displays a form to edit an existing BlhSeguimientoReceptor entity.
     *
     * @Route("/{id}/edit", name="blhseguimientoreceptor_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhSeguimientoReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhSeguimientoReceptor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        
         $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        
        $query4 = $em->createQuery("SELECT e.semana as sem FROM siblhmantenimientoBundle:BlhSeguimientoReceptor e WHERE e.id = $id");
      $sem = $query4->getResult(); 
      settype ($sem, "integer"); 
    //  echo $sem;
      if ($sem == 1)
      {
      $query7 = $em->createQuery("SELECT IDENTITY(e.idReceptor) as receptor FROM siblhmantenimientoBundle:BlhSeguimientoReceptor e WHERE e.id = $id");
      $receptor = $query7->getResult();
      $irecep = $receptor[0]['receptor'];
     
      $query6 = $em->createQuery("SELECT e.tallaIngreso as talla, e.pesoReceptor as peso, e.pc as pc FROM siblhmantenimientoBundle:BlhReceptor e WHERE e.id = $irecep");
      $talla_peso = $query6->getResult(); 
       $x = count($talla_peso);

      }
      
      else {
      $query5 = $em->createQuery("SELECT e.tallaReceptor as talla, e.pesoSeguimiento as peso, e.pcSeguimiento as pc FROM siblhmantenimientoBundle:BlhSeguimientoReceptor e WHERE e.id = $id and e.semana = $sem");
      $talla_peso = $query5->getResult();
          
      }
      
     
      
  

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'hospital' => $establecimiento,
            'talla_peso' =>  $talla_peso,           
           
        );
    }

    /**
    * Creates a form to edit a BlhSeguimientoReceptor entity.
    *
    * @param BlhSeguimientoReceptor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhSeguimientoReceptor $entity)
    {
        $form = $this->createForm(new BlhSeguimientoReceptorType(), $entity, array(
            'action' => $this->generateUrl('blhseguimientoreceptor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

       // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhSeguimientoReceptor entity.
     *
     * @Route("/{id}", name="blhseguimientoreceptor_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhSeguimientoReceptor:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhSeguimientoReceptor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhSeguimientoReceptor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity->setUsuario($usuario);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhseguimientoreceptor_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhSeguimientoReceptor entity.
     *
     * @Route("/{id}", name="blhseguimientoreceptor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhSeguimientoReceptor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhSeguimientoReceptor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhseguimientoreceptor'));
    }

    /**
     * Creates a form to delete a BlhSeguimientoReceptor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhseguimientoreceptor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            //->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    /**
     * Lists all BlhSeguimientoReceptor entities.
     *
     * @Route("/receptores/seguimiento", name="blhreceptores_seguimiento")
     * @Method("GET")
     * @Template()
     */
 
 public function receptoresSeguimientoAction()
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
        
        
         //Obteniendo lista de pacientes que son receptores y que estan en estado "Activo"  
        $query = $em->createQuery("SELECT r.id, r.codigoReceptor, p.id as identificador, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.tercerNombre as nombre3, p.primerApellido as apellido1, p.segundoApellido as apellido2, s.nombre as sexo FROM siblhmantenimientoBundle:BlhReceptor r JOIN r.idPaciente p JOIN p.idSexo s WHERE r.estadoReceptor = 'Activo' and (substring (r.codigoReceptor, 1, 2) = '$idp')");
        
        $receptores_seguimiento  = $query->getResult();
      
        
        return array(
            'receptores_seguimiento' => $receptores_seguimiento,     
            'hospital' => $establecimiento,
        );
        
    }
    
      /**
     * Displays a form to create a new BlhSeguimientoReceptor entity.
     *
     * @Route("/new/{id}", name="blhseguimientoreceptor_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {
        
         //mostrando los datos del receptor seleccionado
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery("SELECT r.id,r.codigoReceptor, p.primerNombre as primer_nombre, p.segundoNombre as segundo_nombre, p.tercerNombre as tercer_nombre, p.primerApellido as primer_apellido, p.segundoApellido as segundo_apellido FROM siblhmantenimientoBundle:BlhReceptor r JOIN r.idPaciente p WHERE r.id = $id "); 
        
        $datos_receptor  = $query->getResult();
        
        $receptor = $em->getRepository('siblhmantenimientoBundle:BlhReceptor')->find($id);
        
        
         //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
     
      $query3 = $em->createQuery("SELECT max(e.semana) + 1 as semana FROM siblhmantenimientoBundle:BlhSeguimientoReceptor e WHERE e.idReceptor = $id");
      $semana = $query3->getResult();      
      
      $query4 = $em->createQuery("SELECT max(e.semana) as sem FROM siblhmantenimientoBundle:BlhSeguimientoReceptor e WHERE e.idReceptor = $id");
      $sem = $query4->getResult(); 
      settype ($sem, "integer");     
      $query6 = $em->createQuery("SELECT e.tallaIngreso as talla, e.pesoReceptor as peso, e.pc as pc FROM siblhmantenimientoBundle:BlhReceptor e WHERE e.id = $id");
      $talla_peso_in = $query6->getResult();       
      
      $query5 = $em->createQuery("SELECT e.tallaReceptor as talla, e.pesoSeguimiento as peso, e.pcSeguimiento as pc FROM siblhmantenimientoBundle:BlhSeguimientoReceptor e WHERE e.idReceptor = $id and e.semana = $sem");
      $talla_peso_seg = $query5->getResult();
      $x = count($talla_peso_seg);
     
      if ($x == 0) {
      $talla_peso_seg =  $talla_peso_in; }
      
      
        if (!$datos_receptor) {
            throw $this->createNotFoundException('Unable to find BlhSolicitud entity.');
        }
        
        
        
        $entity = new BlhSeguimientoReceptor();
        $entity->setidReceptor($receptor);
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'datos_receptor' => $datos_receptor,
            'hospital' => $establecimiento,
            'semana' => $semana,
            'talla_peso_seg' =>  $talla_peso_seg,           
            'talla_peso_in' => $talla_peso_in,
        );
    }
    
}