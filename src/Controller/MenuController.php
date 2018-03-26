<?php
namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MenuController extends AbstractController
{
    /**
     * @Route("/about", name="app_aboutpage")
     */
    public function aboutpage()
    {
        $headings = [
            'burger1' => 'I ate a normal rock once. It did NOT taste like bacon!',
            'burger2' => 'Woohoo! I\'m going on an all-asteroid diet!',
            'burger3' => 'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];
        return $this->render('article/aboutpage.html.twig', array(
            'headings' => $headings,
        ));
    }

    /**
     * @Route("/contact", name="app_contactpage")
     */
    public function contactpage()
    {
        return $this->render('article/contactpage.html.twig');
    }
}