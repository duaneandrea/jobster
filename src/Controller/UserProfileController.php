<?php
namespace App\Controller;

use App\Entity\User;
use App\Entity\UserProfile;
use App\Form\ChangePasswordFormType;
use App\Form\UserProfileFormType;
use App\Service\UserProfileServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserProfileController extends AbstractController
{
    private UserProfileServiceInterface $userProfileService;

    public function __construct(UserProfileServiceInterface $userProfileService, private EntityManagerInterface $entityManager)
    {
        $this->userProfileService = $userProfileService;
    }

    #[Route('/user/profile', name: 'app_user_profile')]
    public function index(Request $request): Response
    {
        $userProfile = $this->getUser()->getUserProfileId() ?? new UserProfile();
        $form = $this->createForm(UserProfileFormType::class, $userProfile);
        $user = $this->getUser();

        $formErrors = [];
        $result = $this->userProfileService->handleUserProfileForm($userProfile, $form, $request);
        $user->setUserProfileId($userProfile);
        $this->entityManager->persist($user);
        $this->entityManager->flush();


        return $this->render('user_profile/index.html.twig', [
            'form' => $form->createView(),
            'profile' => $userProfile,
            'form_errors' => $formErrors,
            'response'=>$result,
        ]);
    }

    #[Route('/user/password', name:'app_change_password')]
    public function changePassword(Request $request): Response{
        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordFormType::class);


        $result = $this->userProfileService->handleChangePassword($user,$form,$request);
        return $this->render('user_profile/password.html.twig', [
            'form' => $form->createView(),
            'response' => $result,
        ]);
    }
}
?>