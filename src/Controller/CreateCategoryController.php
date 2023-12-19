<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class CreateCategoryController extends AbstractController
{
    #[Route('/create/category', name: 'app_create_category')]
    public function createCategory(EntityManagerInterface $entityManager): Response
    {
        $category = new Category();
        $category->setName('Напитки');

        $entityManager->persist($category);
        $entityManager->flush();
        return new Response('Saved new category with id '.$category->getId());
    
    }
}
