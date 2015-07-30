<?php

namespace WS\AdminLTEBundle\Controller;

use WS\AdminLTEBundle\Entity\Article;
use WS\AdminLTEBundle\Entity\TopRecette;
use WS\AdminLTEBundle\Form\ArticleType;
use WS\AdminLTEBundle\Form\TopRecetteType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;


class ArticleController extends Controller
{
    public function ajoutArticleAction(Request $request,$slug)
    {
        $article = new Article();
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('WSAdminLTEBundle:Categorie')->findOneBy(array('slug' => $slug));
        $article->setCategorie($categorie);
        $form = $this->get('form.factory')->create(new ArticleType, $article);

        if ($form->handleRequest($request)->isValid()) {
          
          $em->persist($article);
          $em->flush();

          $request->getSession()->getFlashBag()->add('success', 'Article enregistré.');

          return $this->redirect($this->generateUrl('adminLTE_listeArticle', array('slug'=>$categorie->getSlug())));
        }

        return $this->render('WSAdminLTEBundle:Article:ajout.html.twig', array(
          'form' => $form->createView(),'categorie'=>$categorie
        ));
    }

    public function editArticleAction(Request $request,$slug, Article $article)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new ArticleType, $article);
        if ($form->handleRequest($request)->isValid()) {
         
          $em->persist($article);
          $em->flush();

          $request->getSession()->getFlashBag()->add('success', 'Article modifié .');

          return $this->redirect($this->generateUrl('adminLTE_listeArticle', array('slug'=>$slug)));
        }

        return $this->render('WSAdminLTEBundle:Article:edit.html.twig', array(
          'form' => $form->createView(),'article' => $article
        ));
    }

    public function listeArticleAction($slug){
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('WSAdminLTEBundle:Categorie')->findOneBy(array('slug' => $slug));
        $articles = $em->getRepository('WSAdminLTEBundle:Article')->findBy(array('categorie' => $categorie->getId()));

        return $this->render('WSAdminLTEBundle:Article:liste.html.twig', array('articles'=>$articles, 'categorie'=>$categorie));
    }

     public function supArticleAction( Request $request, Article $article){
        $id=$article->getCategorie()->getId();

         $em = $this->getDoctrine()->getManager();
         $categorie = $em->getRepository('WSAdminLTEBundle:Categorie')->findOneBy(array('id' => $id));
         $em->remove($article);
         $em->flush();
        $request->getSession()->getFlashBag()->add('success', ' Suppression effectuée.');
        
        return $this->redirect($this->generateUrl('adminLTE_listeArticle', array('slug'=>$categorie->getSlug())));
    }

    public function topArticleAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $topRecette = $em->getRepository('WSAdminLTEBundle:TopRecette')->findOneBy(array('id' => 1));
        $form = $this->get('form.factory')->create(new TopRecetteType, $topRecette);

        if ($form->handleRequest($request)->isValid()) {
         
          $em->persist($topRecette);
          $em->flush();

          $request->getSession()->getFlashBag()->add('success', 'Changement bien enregistrée.');

          return $this->redirect($this->generateUrl('adminLTE_topRecette'));
        }

        return $this->render('WSAdminLTEBundle:Article:editTop.html.twig', array(
          'form' => $form->createView()
        ));
    }
}