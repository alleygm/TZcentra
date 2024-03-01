<?php

namespace App\Controller\Library;

use App\Form\Library\BookAddFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Library\Book;
use App\Repository\Library\BookRepository;

class Library extends AbstractController
{
    public function __construct()
    {

    }
    #[Route('/library', name: 'library_index')]
    public function library(Request $request, BookRepository $bookRepository)
    {   
        $books = $bookRepository->findAll();
        dump($books);
        return $this->render('library/index.html.twig', [
            'books' => $books, 
        ]);
    }


    #[Route('/library/add/book', name: 'library_book_add')]
    public function libraryAdd(Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(BookAddFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $bookName = $formData['name'];
            $bookStatus = $formData['status'];
            $bookStartAt = $formData['start_at'];
            $bookEndAt = $formData['end_at'];

            $newBook = new Book($bookName, $bookStatus, $bookStartAt, $bookEndAt);
            $entityManager->persist($newBook);
            $entityManager->flush();
            
            return $this->redirectToRoute('library_index');
        }
        // Отправляем HTML-форму в виде ответа
        return $this->render('library/bookAddModalWindow.html.twig', [
            'form' => $form->createView(),
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