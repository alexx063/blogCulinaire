<?php

namespace WS\AdminLTEBundle\Controller;

use WS\AdminLTEBundle\Entity\Categorie;
use WS\AdminLTEBundle\Form\CategorieType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller
{
    public function headerAction(){
        $user=$this->container->get('security.context')->getToken()->getUser();
        return $this->render('WSAdminLTEBundle::header.html.twig', array('user' => $user));
    }

     public function menuAction(){
        $user=$this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('WSAdminLTEBundle:Categorie')->findAll();
        
        return $this->render('WSAdminLTEBundle::menu.html.twig', array('user' => $user,'categories' => $categories));
    }
    /*********************/

    public function indexAction()
    {
        return $this->render('WSAdminLTEBundle:Admin:index.html.twig');
    }

    public function widgetAction()
    {
        return $this->render('WSAdminLTEBundle:Admin:widget.html.twig');
    }

}
