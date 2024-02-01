<?php

namespace App\Service;

use App\Entity\UserProfile;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

interface UserProfileService
{
    public function handleUserProfileForm(UserProfile $userProfile, FormInterface $form, Request $request): bool;
}