<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(\Swift_Mailer $mailer, Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();

            $emailService->mailContactForm(
                $contactFormData['Votre_Email'],
                $contactFormData['Votre_Message'],
                $contactFormData['Votre_Nom']
            );

            $this->addFlash('success', 'Votre message a bien été envoyé');
            dump($contactFormData);
            return $this->redirectToRoute('home');
        }

        return $this->render('contact/index.html.twig', [
            'email_form' => $form->createView(),
        ]);
    }
}
