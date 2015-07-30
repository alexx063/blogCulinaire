<?php

namespace WS\BlogBundle\Controller;
use WS\AdminLTEBundle\Entity\Categorie;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller
{
    public function indexAction()
    {
        return $this->render('WSBlogBundle:Front:index.html.twig');
    }

    public function headerAction() {

    	$em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('WSAdminLTEBundle:Categorie')->findAll();
        return $this->render('WSBlogBundle:Front:header.html.twig', array('categories'=>$categories));

    }
}
