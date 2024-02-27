<?php

namespace App\Controller\library;

use Composer\Util\Http\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;

class library extends AbstractController
{
    #[Route('/library', name: 'library')]
    public function libraryMain()
    {
    
        return $this->render('library/library.html.twig', ['keyHello' => 'hello', 'keyWorld' => 'world']);
    }


    #[Route('/library/view', name: 'library_view')]
    public function libraryView(Request $request)
    {
        
        $test = $request->request->get('username');
       return new JsonResponse($test);

        // return $this->file('invoice_3241.pdf', 'my_invoice.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }

















}