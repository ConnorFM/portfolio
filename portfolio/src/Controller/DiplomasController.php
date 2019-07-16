<?php

namespace App\Controller;

use App\Entity\Diplomas;
use App\Form\DiplomasType;
use App\Repository\DiplomasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/diplomas")
 */
class DiplomasController extends AbstractController
{
    /**
     * @Route("/", name="diplomas_index", methods={"GET"})
     */
    public function index(DiplomasRepository $diplomasRepository): Response
    {
        return $this->render('diplomas/index.html.twig', [
            'diplomas' => $diplomasRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="diplomas_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $diploma = new Diplomas();
        $form = $this->createForm(DiplomasType::class, $diploma);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($diploma);
            $entityManager->flush();

            return $this->redirectToRoute('diplomas_index');
        }

        return $this->render('diplomas/new.html.twig', [
            'diploma' => $diploma,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="diplomas_show", methods={"GET"})
     */
    public function show(Diplomas $diploma): Response
    {
        return $this->render('diplomas/show.html.twig', [
            'diploma' => $diploma,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="diplomas_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Diplomas $diploma): Response
    {
        $form = $this->createForm(DiplomasType::class, $diploma);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('diplomas_index');
        }

        return $this->render('diplomas/edit.html.twig', [
            'diploma' => $diploma,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="diplomas_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Diplomas $diploma): Response
    {
        if ($this->isCsrfTokenValid('delete'.$diploma->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($diploma);
            $entityManager->flush();
        }

        return $this->redirectToRoute('diplomas_index');
    }
}
