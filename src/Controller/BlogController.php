<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog_list')]
    public function list(): Response
    {
        return new Response('Liste des articles');
    }

    #[Route('/blog/{id}', name: 'blog_show', requirements: ['id' => '\d+'])]
    public function show(int $id): Response
    {
        return new Response('Article numéro ' . $id);
    }
}
