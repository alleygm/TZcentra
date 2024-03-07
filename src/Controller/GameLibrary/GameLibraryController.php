<?php

namespace App\Controller\GameLibrary;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameLibraryController extends AbstractController
{
    #[Route('/gamelibrary', name: 'app_gamelibrary')]
    public function index(): Response
    {
        return $this->render('game_library/index.html.twig', [
            'controller_name' => 'GameLibraryController',
        ]);
    }
}
