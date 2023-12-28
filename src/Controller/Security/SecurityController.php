<?php

namespace App\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;
use App\Entity\User;


class SecurityController extends AbstractController
{
    #[Route('/security', name: 'app_security')]
    public function someAction(Security $security, User $user): Response
    {
        $user = $security->getUser();
        $security->login($user);
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
}
