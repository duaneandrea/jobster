<?php

namespace App\Service;


interface JobsInterface
{
    public function getSingleJob($recordHash);
}