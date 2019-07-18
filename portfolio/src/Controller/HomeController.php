<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\DiplomasRepository;
use App\Repository\LanguagesRepository;
use App\Repository\ProfessionalExperiencesRepository;
use App\Repository\ProjectsRepository;
use App\Repository\SkillsRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(UserRepository $userRepository,
                          DiplomasRepository $diplomasRepository,
                          ProjectsRepository $projectsRepository,
                          LanguagesRepository $languagesRepository,
                          SkillsRepository $skillsRepository,
                          ProfessionalExperiencesRepository $professionalExperiencesRepository,
                          \Swift_Mailer $mailer, Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $message = (new \Swift_Message('You Got Mail from your portfolio!'))
                ->setFrom($contactFormData['fromEmail'])
                ->setTo('mariner.connor@gmail.com')
                ->setBody(
                    $contactFormData['message'],
                    'text/plain'
                )
            ;
            $mailer->send($message);
            $this->addFlash('success', 'Message was sent');
            return $this->redirectToRoute('home');
        }


            return $this->render('home/index.html.twig', [
                'users' => $userRepository->findAll(),
                'diplomas' => $diplomasRepository->findAll(),
                'projects' => $projectsRepository->findAll(),
                'languages' => $languagesRepository->findAll(),
                'skills' => $skillsRepository->findAll(),
                'experiences' => $professionalExperiencesRepository->findAll(),
                'email_form' => $form->createView(),
            ]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('home/admin.html.twig');
    }
}

