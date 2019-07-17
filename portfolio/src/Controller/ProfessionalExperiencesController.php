<?php

namespace App\Controller;

use App\Entity\ProfessionalExperiences;
use App\Form\ProfessionalExperiencesType;
use App\Repository\ProfessionalExperiencesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/experiences")
 */
class ProfessionalExperiencesController extends AbstractController
{
    /**
     * @Route("/", name="professional_experiences_index", methods={"GET"})
     */
    public function index(ProfessionalExperiencesRepository $professionalExperiencesRepository): Response
    {
        return $this->render('professional_experiences/index.html.twig', [
            'professional_experiences' => $professionalExperiencesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="professional_experiences_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $professionalExperience = new ProfessionalExperiences();
        $form = $this->createForm(ProfessionalExperiencesType::class, $professionalExperience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($professionalExperience);
            $entityManager->flush();

            return $this->redirectToRoute('professional_experiences_index');
        }

        return $this->render('professional_experiences/new.html.twig', [
            'professional_experience' => $professionalExperience,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="professional_experiences_show", methods={"GET"})
     */
    public function show(ProfessionalExperiences $professionalExperience): Response
    {
        return $this->render('professional_experiences/show.html.twig', [
            'professional_experience' => $professionalExperience,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="professional_experiences_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProfessionalExperiences $professionalExperience): Response
    {
        $form = $this->createForm(ProfessionalExperiencesType::class, $professionalExperience);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('professional_experiences_index');
        }

        return $this->render('professional_experiences/edit.html.twig', [
            'professional_experience' => $professionalExperience,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="professional_experiences_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProfessionalExperiences $professionalExperience): Response
    {
        if ($this->isCsrfTokenValid('delete'.$professionalExperience->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($professionalExperience);
            $entityManager->flush();
        }

        return $this->redirectToRoute('professional_experiences_index');
    }
}
