<?php

namespace App\Service;

use App\Entity\ContactUs;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class ContactUsImpl implements ContactUsInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }
    public function handleContactUs(ContactUs $contactUs, FormInterface $form, Request $request): array
    {
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $dateCreated = new DateTimeImmutable();
            $contactUs->setDateCreated($dateCreated);
            $contactUs->setRecordDate(time());
            $this->entityManager->persist($contactUs);
            $this->entityManager->flush();

            return
                [
                    'res'=>true,
                    'msg'=>'Your message was submitted successfully, we will get back to you as soon as possible'
                ];
        }else{
            return
                [
                    'res'=>false,
                    'msg'=>'There was an error in submitting your message'
                ];
        }
    }
}