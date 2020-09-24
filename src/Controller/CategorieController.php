<?php

namespace App\Controller;

use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/", name="categorie")
     */
    public function index(\Swift_Mailer $mailer)
    {
        $message = new Swift_Message();
        $message->setSubject('Hello Email')
            ->setFrom('zelhayani@gmail.com')
            ->setTo('elhayani@gmail.com')
            ->setBody(
                $this->renderView(
                    'categorie/index.html.twig',
                    array('controller_name' => 'CategorieController')
                )
            );

        $mailer->send($message);
        $this->addFlash('message', 'mail ok');
        return $this->redirectToRoute('categorie2');
    }

    /**
     * @Route("/categorie2", name="categorie2")
     */
    public function retour()
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }

}
