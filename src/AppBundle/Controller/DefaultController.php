<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
      $posts = $this->getDoctrine()
      ->getRepository(Post::class)
      ->findBy([], ['publishDate' => 'desc']);

      return $this->render('AppBundle:Post:list.html.twig', [
          'posts' => $posts
      ]);

    }
}
