<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
#[Route('/', name: 'home')]
public function home(): Response
{
    return $this->render('portfolio/home.html.twig');
}

#[Route('/about', name: 'about')]
public function about(): Response
{
    return $this->render('portfolio/about.html.twig');
}

#[Route('/contact', name: 'contact')]
public function contact(): Response
{
    return $this->render('portfolio/contact.html.twig');
}
#[Route('/cv', name: 'cv')]
public function cv(): Response
{
    return $this->render('portfolio/cv.html.twig');
}
#[Route('/projects', name: 'projects')]
public function projects(): Response
{
    return $this->render('portfolio/projects.html.twig');
}

}
