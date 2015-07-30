<?php

namespace WS\UserBundle\Controller;

use WS\UserBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function indexAction(Request $request)
    {
        $user=$this->container->get('security.context')->getToken()->getUser();

        $form = $this->get('form.factory')->create(new UserType, $user);

		if ($form->handleRequest($request)->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($user);
          $em->flush();

          $request->getSession()->getFlashBag()->add('success', 'Modification bien enregistrée.');

          return $this->redirect($this->generateUrl('user_editprofil'));
        }
        return $this->render('WSUserBundle:User:editProfil.html.twig', array(
          'form' => $form->createView(),'user' => $user
        ));
    }
}