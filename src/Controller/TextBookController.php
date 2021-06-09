<?php

namespace App\Controller;

use App\Entity\TextBook;
use App\Form\TextBookType;
use App\Repository\TextBookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/text/book")
 */
class TextBookController extends AbstractController
{
    /**
     * @Route("/", name="text_book_index", methods={"GET"})
     */
    public function index(TextBookRepository $textBookRepository): Response
    {
        return $this->render('text_book/index.html.twig', [
            'text_books' => $textBookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="text_book_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $textBook = new TextBook();
        $form = $this->createForm(TextBookType::class, $textBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($textBook);
            $entityManager->flush();

            return $this->redirectToRoute('text_book_index');
        }

        return $this->render('text_book/new.html.twig', [
            'text_book' => $textBook,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="text_book_show", methods={"GET"})
     */
    public function show(TextBook $textBook): Response
    {
        return $this->render('text_book/show.html.twig', [
            'text_book' => $textBook,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="text_book_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TextBook $textBook): Response
    {
        $form = $this->createForm(TextBookType::class, $textBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('text_book_index');
        }

        return $this->render('text_book/edit.html.twig', [
            'text_book' => $textBook,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="text_book_delete", methods={"POST"})
     */
    public function delete(Request $request, TextBook $textBook): Response
    {
        if ($this->isCsrfTokenValid('delete'.$textBook->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($textBook);
            $entityManager->flush();
        }

        return $this->redirectToRoute('text_book_index');
    }
}
