<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;

class MainPageController extends AbstractController
{
    #[Route('/', name: 'main_page')]
    public function showAllProducts(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {
        $productsRepository = $entityManager->getRepository(Product::class);
        $products = $productsRepository->findAll();

        $pagination = $paginator->paginate(
            $productsRepository->paginationQuery(),
            $request->query->get('page', 1),
            2
        );

        return $this->render('main_page/index.html.twig', [
            'pagination' => $pagination
        ]);
    }
}
