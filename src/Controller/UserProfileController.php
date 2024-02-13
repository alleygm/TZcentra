<?php

namespace App\Controller;

use App\Form\UserProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserProfileController extends AbstractController
{
    #[Route('/users/profile', name: 'app_users_profile')]
    public function index(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UserProfileType::class, $user);
        $form->handleRequest($request);

      /*   if ($form->isSubmitted() && $form->isValid()) {
         $user->setPassword($form->get('password')->getData());

            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('app_success_register');
        } */
        return $this->render('user_profile/index.html.twig', [
            'user'=> $user, 'userForm' => $form->createView(),
        ]);
    }
}
