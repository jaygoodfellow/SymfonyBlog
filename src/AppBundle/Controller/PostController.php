<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PostController extends Controller
{

    /**
     * @Route("/post/{slug}", name="post_show")
     */
    public function showAction($slug)
    {
      $post = $this->getDoctrine()
      ->getRepository(Post::class)
      ->findOneBySlug($slug);

      $comments = $this->getDoctrine()
      ->getRepository(Comment::class)
      ->findBy(['post'=> $post->getId()], ['dateCreated' => 'desc']);


      return $this->render('AppBundle:Post:show.html.twig', array(
          'post' => $post,
          'comments' => $comments
      ));
    }

}
