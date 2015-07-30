<?php

namespace WS\AdminLTEBundle\Controller;

use WS\AdminLTEBundle\Entity\Categorie;
use WS\AdminLTEBundle\Form\CategorieType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;


class CategorieController extends Controller
{

    public function listeCategorieAction(){

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('WSAdminLTEBundle:Categorie')->findAll();
        return $this->render('WSAdminLTEBundle:Categorie:listeCategorie.html.twig', array('categories'=>$categories));
    }

    public function ajoutCategorieAction(Request $request){

        $categorie = new Categorie;
        $form = $this->get('form.factory')->create(new CategorieType, $categorie);

        if ($form->handleRequest($request)->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($categorie);
          $em->flush();

          $request->getSession()->getFlashBag()->add('success', 'Catégorie bien enregistrée.');

          return $this->redirect($this->generateUrl('adminLTE_listeCategorie'));
        }

        return $this->render('WSAdminLTEBundle:Categorie:ajoutCategorie.html.twig', array(
          'form' => $form->createView(),
        ));
    } 

    public function editCategorieAction(Request $request, Categorie $categorie){
        $form = $this->get('form.factory')->create(new CategorieType, $categorie);

        if ($form->handleRequest($request)->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($categorie);
          $em->flush();

          $request->getSession()->getFlashBag()->add('success', 'Catégorie modifiée.');

          return $this->redirect($this->generateUrl('adminLTE_listeCategorie'));
        }
        return $this->render('WSAdminLTEBundle:Categorie:ajoutCategorie.html.twig', array(
          'form' => $form->createView(),
        ));
    } 

    public function supCategorieAction( Request $request, Categorie $categorie){
    	$em = $this->getDoctrine()->getManager();
    	$em->remove($categorie);
      	$em->flush();
      	$request->getSession()->getFlashBag()->add('success', 'Suppression effectuée.');
      	
      	return $this->redirect($this->generateUrl('adminLTE_listeCategorie'));

    }
}