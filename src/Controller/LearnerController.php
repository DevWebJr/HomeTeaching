<?php

namespace App\Controller;

use App\Entity\Learner;
use App\Form\LearnerType;
use App\Repository\LearnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/learner")
 */
class LearnerController extends AbstractController
{
    /**
     * @Route("/", name="learner_index", methods={"GET"})
     */
    public function index(LearnerRepository $learnerRepository): Response
    {
        return $this->render('learner/index.html.twig', [
            'learners' => $learnerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="learner_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $learner = new Learner();
        $form = $this->createForm(LearnerType::class, $learner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($learner);
            $entityManager->flush();

            return $this->redirectToRoute('learner_index');
        }

        return $this->render('learner/new.html.twig', [
            'learner' => $learner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="learner_show", methods={"GET"})
     */
    public function show(Learner $learner): Response
    {
        return $this->render('learner/show.html.twig', [
            'learner' => $learner,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="learner_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Learner $learner): Response
    {
        $form = $this->createForm(LearnerType::class, $learner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('learner_index');
        }

        return $this->render('learner/edit.html.twig', [
            'learner' => $learner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="learner_delete", methods={"POST"})
     */
    public function delete(Request $request, Learner $learner): Response
    {
        if ($this->isCsrfTokenValid('delete'.$learner->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($learner);
            $entityManager->flush();
        }

        return $this->redirectToRoute('learner_index');
    }
}
