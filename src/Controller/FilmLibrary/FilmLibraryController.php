<?php

namespace App\Controller\FilmLibrary;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmLibraryController extends AbstractController
{
    #[Route('/filmlibrary', name: 'app_filmlibrary')]
    public function index(): Response
    {
        return $this->render('film_library/index.html.twig', [
            'controller_name' => 'FilmLibraryController',
        ]);
    }
}
