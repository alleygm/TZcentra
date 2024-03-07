<?php

namespace App\Controller\Library;

use App\Form\Library\BookAddFormType;
use App\Form\Library\BookViewFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Library\Book;
use App\Repository\Library\BookRepository;


class LibraryController extends AbstractController
{
    public function __construct()
    {
        
    }
    #[Route('/library', name: 'library_index')]
    public function library(Request $request, BookRepository $bookRepository)
    {   
        $books = $bookRepository->findAll();
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
            $user = $this->getUser();
            $newBook = new Book($bookName, $bookStatus, $bookStartAt, $bookEndAt, $user);
            $entityManager->persist($newBook);
            $entityManager->flush();
            
            return new RedirectResponse('/library');
        }
        // Отправляем HTML-форму в виде ответа
        return $this->render('library/bookAddModalWindow.html.twig', [
            'form' => $form->createView(),
            'url' => $request->getPathInfo(),
        ]);
    }

    #[Route('/library/view/book/{id}', name: 'library_book_view')]
    public function libraryView(Request $request, $id = null, BookRepository $bookRepository)
    {
        $book = $bookRepository->findOneBy(['id' => $id]);
        $viewForm = $this->createForm(BookViewFormType::class, $book);
        $viewForm->handleRequest($request);
        if ($viewForm->isSubmitted() && $viewForm->isValid()) {
        
        }
        
        return $this->render('library/bookViewModalWindow.html.twig', [
            'form' => $viewForm->createView(),
            'url' => $request->getPathInfo(),
        ]);
    }

















}