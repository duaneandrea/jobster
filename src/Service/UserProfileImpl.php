<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\UserProfile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class UserProfileImpl implements UserProfileService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handleUserProfileForm(UserProfile $userProfile, FormInterface $form, Request $request): bool
    {
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($userProfile);
            $this->entityManager->flush();


            return true;
        }

        return false;
    }
}