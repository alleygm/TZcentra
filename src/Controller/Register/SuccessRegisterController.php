<?php

namespace App\Controller\Register;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuccessRegisterController extends AbstractController
{
    #[Route('/register/success', name: 'app_success_register')]
    public function index(): Response
    {
        return $this->render('registration/successRegister.html.twig');
    }
}
