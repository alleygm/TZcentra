<?php

namespace App\Controller\MainPage;

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
    public function mainPage(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {
        
        return $this->render('main_page/index.html.twig', [
        ]);
    }
}
