<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;

class CreateProductController extends AbstractController
{
    #[Route('/create/product', name: 'app_create_product')]
    public function createProduct(EntityManagerInterface $entityManager): Response
    {
        $categoryRepository = $entityManager->getRepository(Category::class);
        $category = $categoryRepository->findOneById(2);
        $product = new Product();
        $product->setName('Минералка');
        $product->setCategoryId($category);

        $entityManager->persist($product);
        $entityManager->flush();
        return new Response('Saved new product with id '.$product->getId());
    
    }
}
