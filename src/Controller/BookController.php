<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    public function __construct(private BookRepository $bookRepository)
    {
    }

    #[Route('/book', name: 'app_book', methods: ['GET','HEAD'])]
    public function index(): Response
    {
        $this->bookRepository->collectsByAuthorandUsers();
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }
}
