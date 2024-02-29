<?php

namespace App\Controller\Library;

use App\Form\Library\BookAddFormType;
use Composer\Util\Http\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;

class Library extends AbstractController
{
    public function __construct()
    {

    }
    #[Route('/library', name: 'library_index')]
    public function library(Request $request)
    {
        return $this->render('library/index.html.twig', ['keyHello' => 'hello', 'keyWorld' => 'world']);
    }


    #[Route('/library/add/book', name: 'library_book_add')]
    public function libraryAdd(Request $request)
    {
        $form = $this->createForm(BookAddFormType::class)->createView();
        // Отправляем HTML-форму в виде ответа
        return $this->render('library/bookAddModalWindow.html.twig', [
            'form' => $form,
            'url' => $request->getPathInfo(),
        ]);
        // return $this->file('invoice_3241.pdf', 'my_invoice.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }

    #[Route('/library/view/book/{id}', name: 'library_view')]
    public function libraryView(Request $request)
    {
        return $this->render('library/index.html.twig', ['keyHello' => 'hello', 'keyWorld' => 'world']);
    }

















}