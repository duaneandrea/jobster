<?php

namespace App\Service;

use App\Repository\JobRepository;

class JobsImpl implements JobsInterface
{
    public function __construct(private JobRepository $jobRepository)
    {
    }

    public function getSingleJob($recordHash)
    {
        return $this->jobRepository->findOneBy(['recordHash'=>$recordHash]);
    }
}