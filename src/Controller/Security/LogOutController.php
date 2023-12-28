<?php

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LogOutController extends AbstractController
{
    #[Route('/logout', name: 'app_log_out')]
    public function index()
    {
    }
}
