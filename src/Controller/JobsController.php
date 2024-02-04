<?php

namespace App\Controller;

use App\Repository\JobRepository;
use App\Service\JobsInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobsController extends AbstractController
{
    public function __construct(private JobsInterface $jobs)
    {
    }

    #[Route('/jobs', name: 'app_jobs')]
    public function index(): Response
    {
        return $this->render('jobs/index.html.twig', [
        ]);
    }

    #[Route('/job/{recordHash}', name: 'view_job')]
    public function show($recordHash): Response
    {

        return $this->render('jobs/index.html.twig', [
            'jobs'=> $this->jobs->getSingleJob($recordHash),
            'skills'=>explode(",",$this->jobs->getSingleJob($recordHash)->getSkills())
        ]);
    }
}
