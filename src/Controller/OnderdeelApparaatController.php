<?php

namespace App\Controller;

use App\Entity\OnderdeelApparaat;
use App\Form\OnderdeelApparaatType;
use App\Repository\OnderdeelApparaatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/onderdeel/apparaat')]
class OnderdeelApparaatController extends AbstractController
{
    #[Route('/', name: 'onderdeel_apparaat_index', methods: ['GET'])]
    public function index(OnderdeelApparaatRepository $onderdeelApparaatRepository): Response
    {
        return $this->render('onderdeel_apparaat/index.html.twig', [
            'onderdeel_apparaats' => $onderdeelApparaatRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'onderdeel_apparaat_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $onderdeelApparaat = new OnderdeelApparaat();
        $form = $this->createForm(OnderdeelApparaatType::class, $onderdeelApparaat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($onderdeelApparaat);
            $entityManager->flush();

            return $this->redirectToRoute('onderdeel_apparaat_index');
        }

        return $this->render('onderdeel_apparaat/new.html.twig', [
            'onderdeel_apparaat' => $onderdeelApparaat,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'onderdeel_apparaat_show', methods: ['GET'])]
    public function show(OnderdeelApparaat $onderdeelApparaat): Response
    {
        return $this->render('onderdeel_apparaat/show.html.twig', [
            'onderdeel_apparaat' => $onderdeelApparaat,
        ]);
    }

    #[Route('/{id}/edit', name: 'onderdeel_apparaat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OnderdeelApparaat $onderdeelApparaat): Response
    {
        $form = $this->createForm(OnderdeelApparaatType::class, $onderdeelApparaat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('onderdeel_apparaat_index');
        }

        return $this->render('onderdeel_apparaat/edit.html.twig', [
            'onderdeel_apparaat' => $onderdeelApparaat,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'onderdeel_apparaat_delete', methods: ['DELETE'])]
    public function delete(Request $request, OnderdeelApparaat $onderdeelApparaat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$onderdeelApparaat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($onderdeelApparaat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('onderdeel_apparaat_index');
    }
}
