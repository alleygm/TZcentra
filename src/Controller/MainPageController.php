<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
#use Pagerfanta\Adapter\ArrayAdapter;
#use Pagerfanta\Pagerfanta;

class MainPageController extends AbstractController
{
    #[Route('/', name: 'main_page')]
    public function showAllProducts(EntityManagerInterface $entityManager): Response
    {
        $productsRepository = $entityManager->getRepository(Product::class);
        $products = $productsRepository->findAll();

        // Пагинация
        #$adapter = new ArrayAdapter($products);
        #$pagerfanta = new Pagerfanta($adapter);
        #$maxPerPage = 10;
        #$pagerfanta->setMaxPerPage($maxPerPage);
        #$pagerfanta->setCurrentPage(1);

        return $this->render('main_page/index.html.twig', [
            'products' => $products,
        ]);
    }
}
