<?php

namespace App\Controller;

use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(private JobRepository $jobRepository)
    {

    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $latestJobs = $this->jobRepository->findBy([], ['id' => 'DESC'],10);
        return $this->render('home/index.html.twig',[
            'jobs'=>$latestJobs
        ]);
    }

    #[Route('/about-us', name: 'app_about_us')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }

}
