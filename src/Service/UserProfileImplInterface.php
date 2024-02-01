<?php

namespace App\Service;

use App\Entity\UserProfile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserProfileImplInterface implements UserProfileServiceInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager, private UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
    }

    public function handleUserProfileForm(UserProfile $userProfile, FormInterface $form, Request $request): array
    {
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($userProfile);
            $this->entityManager->flush();

            return [
                'res' => true,
                'msg' => 'The profile has been updated successfully!!'
            ];
        }

        return [];
    }

    public function handleChangePassword($user, FormInterface $form, Request $request): array
    {
        $returnArray = array();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $currentPassword = $form->getData()['currentPassword'];
            $newPassword = $form->getData()['newPassword'];
            $conNewPassword = $form->getData()['conNewPassword'];

            if(!$this->passwordHasher->isPasswordValid($user,$currentPassword)){
                return[
                        'res'=>false,
                        'msg'=>"The current password you have entered in incorrect."
                    ];
            }else if($newPassword !== $conNewPassword){
                return[
                        'res'=>false,
                        'msg'=>"The new passwords do not match"
                    ];
            }else{
                $hashedPassword = $this->passwordHasher->hashPassword($user,$newPassword);
                $user->setPassword($hashedPassword);
                $this->entityManager->persist($user);
                $this->entityManager->flush();

                return[
                        'res'=>true,
                        'msg'=>"The password was updated successfully"
                    ];
            }


        }

        return [];
    }
}