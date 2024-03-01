<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Finder\Finder;
class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    #[Route('/test/ajax', name: 'ajaxtest')]
    public function ajax(Request $request): Response
    {
        $filename = $request->query->get('filename');
        $login = $request->query->get('login');
        $password = $request->query->get('password');
        $nickname = $request->query->get('nickname');

        $batData = '@echo off cd /d "A:\Comeback136.pw\Comeback136.pw\element" start "п" "ElementClient.exe" startbypatcher nocheck console:1 user: pwd: role:';

        // Путь к файлу, который нужно создать
        $batFilePath = 'A:\Comeback136.pw\Comeback136.pw\element';

        // Создаем bat файл и записываем в него данные
        $batContent = '@echo off
        echo "Hello, this is a batch file"
        pause';

        $publicDirectory = $this->getParameter('kernel.project_dir');
        file_put_contents('your242ile.bat', $batContent);

        // $directoryToSearch = 'A:\\';
        // $fileNameToFind = '1лучник.bat';

        // $result = $this->searchFileInDirectory($directoryToSearch, $fileNameToFind);
        // if ($result) {
        //     exec($result);
        // } else {
        //     echo('Файл не найден.');
        // }
        return new JsonResponse(['message' => $publicDirectory]);
    }

    function searchFileInDirectory($directory, $fileName) {
        $finder = new Finder();
        $finder->files()->in($directory)->name($fileName);
    
        foreach ($finder as $file) {
            return $file->getRealPath();
        }
    
        return false;
    }
}
