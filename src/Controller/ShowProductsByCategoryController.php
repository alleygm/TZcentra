<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;

class ShowProductsByCategoryController extends AbstractController
{
    #[Route('/show/products/by/category/{id}', name: 'showProductsByCategory')]
    public function showProductsByCategory(EntityManagerInterface $entityManager, $id): Response
    {
        $categoryRepository = $entityManager->getRepository(Category::class);
        $category = $categoryRepository->findOneById($id);

        $productRepository = $entityManager->getRepository(Product::class);
        $product = $productRepository->findBy(['category_id' => $id]);

        return $this->render('show_products_by_category/index.html.twig', [
            'products' => $product, 'category' => $category
        ]);
    }
}
