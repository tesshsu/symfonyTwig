<?php
namespace App\Controller;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Twig\Environment;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('OMG! My first page already! WOOO!');
    }
    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        //dump($slug, $this);
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];
        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments,
            'slug' => $slug,
        ]);
    }
    /**
     * @Route("/news/{slug}/star", name="article_toggle_star", methods={"POST"})
     */
    public function toggleArticleStar($slug, LoggerInterface $logger)
    {
        $logger->info('this is been rating');
        return new JsonResponse(['stars' => rand(5, 100)]);

    }
}