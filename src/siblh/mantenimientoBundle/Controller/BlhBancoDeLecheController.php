<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhBancoDeLeche;
use siblh\mantenimientoBundle\Form\BlhBancoDeLecheType;

/**
 * BlhBancoDeLeche controller.
 *
 * @Route("/blhbancodeleche")
 */
class BlhBancoDeLecheController extends Controller
{

    /**
     * Lists all BlhBancoDeLeche entities.
     *
     * @Route("/", name="blhbancodeleche")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
      $em = $this->getDoctrine()->getManager();
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();       
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id, b.codigoBancoDeLeche, b.estadoBanco, 
          e.nombre as nombre FROM siblhmantenimientoBundle:BlhBancoDeLeche b join b.idEstablecimiento e");
      $banco = $query2->getResult(); 

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhBancoDeLeche')->findAll();

        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
            'banco' => $banco,
        );
    }
    /**
     * Creates a new BlhBancoDeLeche entity.
     *
     * @Route("/", name="blhbancodeleche_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhBancoDeLeche:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhBancoDeLeche();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhbancodeleche_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhBancoDeLeche entity.
    *
    * @param BlhBancoDeLeche $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhBancoDeLeche $entity)
    {
        $form = $this->createForm(new BlhBancoDeLecheType(), $entity, array(
            'action' => $this->generateUrl('blhbancodeleche_create'),
            'method' => 'POST',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhBancoDeLeche entity.
     *
     * @Route("/new", name="blhbancodeleche_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
      $em = $this->getDoctrine()->getManager();          
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();       
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      $querycod = $em->createQuery("select max(substring (b.codigoBancoDeLeche, 5, 2)) as correlativo
                                      from siblhmantenimientoBundle:BlhBancoDeLeche b");
      $max = $querycod->getResult(); 
     //   echo $max;
        $maxi=$max[0]['correlativo']; 
        $maxcorrel = (int)$maxi;
        $maxcorrelativo = $maxcorrel+1;
        if($maxcorrelativo <10)
            {
        $correlativo='0'.$maxcorrelativo;
        $correlativo = (string)$correlativo;
         }
        else{
            $correlativo = (string)$maxcorrelativo;
            }
      
      $codigobanco= 'BLH-'.$correlativo;
      echo $codigobanco;
        
        $entity = new BlhBancoDeLeche();
        $entity->setCodigoBancoDeLeche($codigobanco);
        $form   = $this->createCreateForm($entity);
       

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'hospital' => $establecimiento,
        );
    }

    /**
     * Finds and displays a BlhBancoDeLeche entity.
     *
     * @Route("/{id}", name="blhbancodeleche_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhBancoDeLeche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhBancoDeLeche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhBancoDeLeche entity.
     *
     * @Route("/{id}/edit", name="blhbancodeleche_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();       
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhBancoDeLeche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhBancoDeLeche entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'hospital' => $establecimiento,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a BlhBancoDeLeche entity.
    *
    * @param BlhBancoDeLeche $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhBancoDeLeche $entity)
    {
        $form = $this->createForm(new BlhBancoDeLecheType(), $entity, array(
            'action' => $this->generateUrl('blhbancodeleche_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

    //    $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhBancoDeLeche entity.
     *
     * @Route("/{id}", name="blhbancodeleche_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhBancoDeLeche:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhBancoDeLeche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhBancoDeLeche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhbancodeleche_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhBancoDeLeche entity.
     *
     * @Route("/{id}", name="blhbancodeleche_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhBancoDeLeche')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhBancoDeLeche entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhbancodeleche'));
    }

    /**
     * Creates a form to delete a BlhBancoDeLeche entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhbancodeleche_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
          /**
     * Lists all BlhReceptor entity.
     *
     * @Route("/listado/estadisticas", name="lisatdo_estadisticas")
     * @Method("GET")
     * @Template()
     */
 
 public function listadoEstadisticasAction()
    {

        
        $em = $this->getDoctrine()->getManager();   
      //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
           
         return array(
            'hospital' => $establecimiento,
        );
        
    }
    
}
