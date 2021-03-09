<?php

namespace App\Controller;

use App\Entity\Onderdelen;
use App\Form\OnderdelenType;
use App\Repository\OnderdelenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/onderdelen')]
class OnderdelenController extends AbstractController
{
    #[Route('/', name: 'onderdelen_index', methods: ['GET'])]
    public function index(OnderdelenRepository $onderdelenRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('onderdelen/index.html.twig', [
            'onderdelens' => $onderdelenRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'onderdelen_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $onderdelen = new Onderdelen();
        $form = $this->createForm(OnderdelenType::class, $onderdelen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($onderdelen);
            $entityManager->flush();

            return $this->redirectToRoute('onderdelen_index');
        }

        return $this->render('onderdelen/new.html.twig', [
            'onderdelen' => $onderdelen,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'onderdelen_show', methods: ['GET'])]
    public function show(Onderdelen $onderdelen): Response
    {
        return $this->render('onderdelen/show.html.twig', [
            'onderdelen' => $onderdelen,
        ]);
    }

    #[Route('/{id}/edit', name: 'onderdelen_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Onderdelen $onderdelen): Response
    {
        $form = $this->createForm(OnderdelenType::class, $onderdelen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('onderdelen_index');
        }

        return $this->render('onderdelen/edit.html.twig', [
            'onderdelen' => $onderdelen,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'onderdelen_delete', methods: ['DELETE'])]
    public function delete(Request $request, Onderdelen $onderdelen): Response
    {
        if ($this->isCsrfTokenValid('delete'.$onderdelen->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($onderdelen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('onderdelen_index');
    }
}
