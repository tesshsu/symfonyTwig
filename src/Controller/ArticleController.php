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
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('article/homepage.html.twig');
    }
    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show($slug)
    {
        //dump($slug, $this);
        $comments = [
            'tess hsu' => 'I ate a normal rock once. It did NOT taste like bacon!',
            'Stephan' => 'Woohoo! I\'m going on an all-asteroid diet!',
            'Alexandre Frank' => 'I like bacon too! Buy some from my site! bakinsomebacon.com',
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
        $logger->notice('so show the loggerInterface');
        return new JsonResponse(['stars' => rand(5, 100)]);
    }
}
