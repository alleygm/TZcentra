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
        dump($books);
        return $this->render('library/index.html.twig', [
            'books' => $books, 
        ]);
    }


    #[Route('/library/add/book', name: 'library_add_book')]
    public function libraryAddBook(Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(BookAddFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $bookName = $formData['name'];
            $bookAuthor = $formData['author'];
            $bookStatus = $formData['status'];
            $bookStartAt = $formData['start_at'];
            $bookEndAt = $formData['end_at'];
            $bookComment = $formData['comment'];
            $user = $this->getUser();
            $newBook = new Book($bookName, $bookAuthor, $bookStatus, $bookStartAt, $bookEndAt, $bookComment, $user);
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

    #[Route('/library/view/book/{id}', name: 'library_view_book')]
    public function libraryViewBook(Request $request, $id = null, BookRepository $bookRepository)
    {
        $book = $bookRepository->findOneBy(['id' => $id]);
        $viewForm = $this->createForm(BookViewFormType::class, $book);
        
        return $this->render('library/bookViewModalWindow.html.twig', [
            'form' => $viewForm->createView(),
            'url' => $request->getPathInfo(),
        ]);
    }
    #[Route('/library/edit/book', name: 'library_edit_book')]
    public function libraryEditBook(Request $request, BookRepository $bookRepository, EntityManagerInterface $entityManager)
    {
        $viewForm = $this->createForm(BookViewFormType::class);
        $viewForm->handleRequest($request);
        if ($viewForm->isSubmitted() && $viewForm->isValid()) {
        
            $formData = $viewForm->getData();
            $book = $bookRepository->findOneBy(['id' => $formData['id']]);
            $book->setName($formData['name']);
            $book->setAuthor($formData['author']);
            $book->setStatus($formData['status']);
            $book->setStartAt($formData['start_at']);
            $book->setEndAt($formData['end_at']);
            $book->setComment($formData['comment']);
            $entityManager->flush();
            return new RedirectResponse('/library');
        }

        return new RedirectResponse('/library');
    }

    #[Route('/library/delete/book', name: 'library_delete_book')]
    public function libraryDeleteBook(Request $request, BookRepository $bookRepository, EntityManagerInterface $entityManager)
    {

        return new RedirectResponse('/library');
    }













}