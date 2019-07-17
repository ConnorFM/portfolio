<?php

namespace App\Controller;

use App\Repository\DiplomasRepository;
use App\Repository\LanguagesRepository;
use App\Repository\ProfessionalExperiencesRepository;
use App\Repository\ProjectsRepository;
use App\Repository\SkillsRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
                          SkillsRepository $skillsRepository, ProfessionalExperiencesRepository $professionalExperiencesRepository)
    {
        return $this->render('home/index.html.twig', [
            'users' => $userRepository->findAll(),
            'diplomas' => $diplomasRepository->findAll(),
            'projects' => $projectsRepository->findAll(),
            'languages' => $languagesRepository->findAll(),
            'skills' => $skillsRepository->findAll(),
            'experiences' => $professionalExperiencesRepository->findAll(),
        ]);
    }
}

