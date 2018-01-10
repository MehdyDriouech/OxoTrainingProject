<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OXO\TrainingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{
  public function indexAction()
    {
      // ...

      // Notre liste d'annonce en dur
      $listAdverts = array(
        array(
          'title'   => 'Recherche développpeur Symfony',
          'id'      => 1,
          'author'  => 'Alexandre',
          'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
          'date'    => new \Datetime()),
        array(
          'title'   => 'Mission de webmaster',
          'id'      => 2,
          'author'  => 'Hugo',
          'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
          'date'    => new \Datetime()),
        array(
          'title'   => 'Offre de stage webdesigner',
          'id'      => 3,
          'author'  => 'Mathieu',
          'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
          'date'    => new \Datetime())
      );

      // Et modifiez le 2nd argument pour injecter notre liste
      return $this->render('OXOTrainingBundle:Advert:index.html.twig', array('listAdverts' => $listAdverts));
    }

    public function viewAction($id)
      {
        $advert = array(
          'title'   => 'Recherche développpeur Symfony2',
          'id'      => $id,
          'author'  => 'Alexandre',
          'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
          'date'    => new \Datetime()
        );

        return $this->render('OXOTrainingBundle:Advert:view.html.twig', array(
          'advert' => $advert
        ));
      }

public function addAction(Request $request)
{
  $session = $request->getSession();
  $session->getFlashBag()->add('info', 'Annonce bien enregistrée');
  $session->getFlashBag()->add('info', 'Oui oui, elle est bien enregistrée !');
  return $this->redirectToRoute('oxo_platform_view', array('id' => 5));
}

public function editAction($id, Request $request)
  {
    // ...

    $advert = array(
      'title'   => 'Recherche développpeur Symfony',
      'id'      => $id,
      'author'  => 'Alexandre',
      'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
      'date'    => new \Datetime()
    );

    return $this->render('OXOTrainingBundle:Advert:edit.html.twig', array(
      'advert' => $advert
    ));
  }

  public function deleteAction($id)
  {
    return $this->render('OXOTrainingBundle:Advert:delete.html.twig');
  }

  public function menuAction()
  {
    // On fixe en dur une liste ici, bien entendu par la suite
    // on la récupérera depuis la BDD !
    $listAdverts = array(
      array('id' => 2, 'title' => 'Recherche développeur Symfony'),
      array('id' => 5, 'title' => 'Mission de webmaster'),
      array('id' => 9, 'title' => 'Offre de stage webdesigner')
    );

    return $this->render('OXOTrainingBundle:Advert:menu.html.twig', array(
      // Tout l'intérêt est ici : le contrôleur passe
      // les variables nécessaires au template !
      'listAdverts' => $listAdverts
    ));
  }


}
