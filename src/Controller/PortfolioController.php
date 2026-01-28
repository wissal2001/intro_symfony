<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    #[Route('/cv', name: 'portfolio_cv')]
    public function cv(): Response
    {
        return $this->render('portfolio/cv.html.twig');
    }

    #[Route('/contact', name: 'portfolio_contact')]
    public function contact(): Response
    {
        return $this->render('portfolio/contact.html.twig');
    }
    #[Route('/projects', name: 'portfolio_projects')]
    public function projects(): Response
    {
        $projects = [
        [
            'title' => 'Site Portfolio',
            'description' => 'Un site pour présenter mes projets',
            'technologies' => 'Symfony, Twig, PHP'
        ],
        [
            'title' => 'Application de Gestion',
            'description' => 'Application pour gérer des tâches',
            'technologies' => 'PHP, MySQL, Bootstrap'
        ]
    ];
        return $this->render('portfolio/projects.html.twig');
    } 
}
