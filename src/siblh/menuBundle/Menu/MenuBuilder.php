<?php

namespace siblh\menuBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use siblh\mantenimientoBundle\Entity\BlhMenu;
use siblh\mantenimientoBundle\Form\BlhMenuType;
class MenuBuilder extends Controller
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
         //-- Crear el objeto EntityManager de Doctrine
        //include 'Controller.php';
       $em = $this->getDoctrine()->getEntityManager();
         //-- Obtener todas las tuplas de la tabla estudiante
        $menuItems =  $em->getRepository('siblhmenuBundle:BlhMenu')->findAll();
        
        $menu = $factory->createItem('root');
    	$menu->setChildrenAttribute('class', 'nav');
        //$texto = '';
        foreach($menuItems as $Item){
           
            $texto = $Item->nombreMenu;
            $texto2 = $Item->id;
            //echo $menuItems;
            $menu->addChild($texto, array('route' => ''))
			->setAttribute('dropdown', true)
                        ->setAttribute('icon', 'icon-list');
            
            $menuSubItems =  $em->getRepository('siblhmenuBundle:BlhOpcionMenu')->findBy(array('idMenu' => $texto2));
            
             foreach($menuSubItems as $SubItem){
                 
                 $menu[$texto]->addChild($SubItem->nombreOpcion, array('route' => 'siblh_menu_homepage'))
			->setAttribute('icon', 'icon-edit');
                 
             }
            // echo $producto."<br>";
        }
        
    	/*$menu = $factory->createItem('root');
    	$menu->setChildrenAttribute('class', 'nav');

		$menu->addChild('Projects', array('route' => 'siblh_menu_homepage'))
			->setAttribute('icon', 'icon-list');

		$menu->addChild('Employees', array('route' => 'siblh_menu_homepage'))
			->setAttribute('icon', 'icon-group');

       */ return $menu;
    }

    public function userMenu(FactoryInterface $factory, array $options)
    {
    	$menu = $factory->createItem('root');
    	$menu->setChildrenAttribute('class', 'nav pull-right');

    	/*
    	You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.

    	if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN', 'ROLE_USER'))) {} // Check if the visitor has any authenticated roles
    	$username = $this->container->get('security.context')->getToken()->getUser()->getUsername(); // Get username of the current logged in user

    	*/	
		$menu->addChild('User', array('label' => 'Hi visitor'))
			->setAttribute('dropdown', true)
			->setAttribute('icon', 'icon-user');

		$menu['User']->addChild('Edit profile', array('route' => 'siblh_menu_profile'))
			->setAttribute('icon', 'icon-edit');

        return $menu;
    }
}