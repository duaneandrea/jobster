<?php

namespace App\Service;

use App\Entity\ContactUs;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

interface ContactUsInterface
{
    public function handleContactUs(ContactUs $contactUs, FormInterface $form, Request $request): array;
}