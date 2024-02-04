<?php

namespace App\Controller;

use App\Entity\ContactUs;
use App\Form\ContactUsFormType;
use App\Service\ContactUsInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTimeImmutable;

class ContactUsController extends AbstractController
{
    public function __construct(private ContactUsInterface $contactUs)
    {
    }

    #[Route('/contact-us', name: 'app_contact_us')]
    public function index(Request $request): Response
    {
        $contactUs = new ContactUs();
        $form = $this->createForm(ContactUsFormType::class,$contactUs);

        $result = $this->contactUs->handleContactUs($contactUs,$form,$request);
        if($result['res']==true){
            $this->addFlash('success', $result['msg']);
            return $this->redirectToRoute('app_contact_us');
        }else{
            return $this->render('home/contact.html.twig', [
                'form'=>$form->createView(),
                'response'=>$result
            ]);
        }
    }
}
