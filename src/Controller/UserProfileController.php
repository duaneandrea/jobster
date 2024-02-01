<?php
namespace App\Controller;

use App\Entity\User;
use App\Entity\UserProfile;
use App\Form\UserProfileFormType;
use App\Service\UserProfileService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserProfileController extends AbstractController
{
    private UserProfileService $userProfileService;

    public function __construct(UserProfileService $userProfileService, private EntityManagerInterface $entityManager)
    {
        $this->userProfileService = $userProfileService;
    }

    #[Route('/user/profile', name: 'app_user_profile')]
    public function index(Request $request): Response
    {
        $userProfile = $this->getUser()->getUserProfileId() ?? new UserProfile();
        $form = $this->createForm(UserProfileFormType::class, $userProfile);
        $user = $this->entityManager->getRepository(User::class)->find($this->getUser());

        $formErrors = [];

        if ($this->userProfileService->handleUserProfileForm($userProfile, $form, $request)) {
            $user->setUserProfileId($userProfile);
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        return $this->render('user_profile/index.html.twig', [
            'form' => $form->createView(),
            'profile' => $userProfile,
            'form_errors' => $formErrors,
        ]);
    }
}
?>