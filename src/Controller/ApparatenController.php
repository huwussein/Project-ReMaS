<?php

namespace App\Controller;

use App\Entity\Apparaten;
use App\Form\ApparatenType;
use App\Repository\ApparatenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

#[Route('/apparaten')]
class ApparatenController extends AbstractController
{
    #[Route('/', name: 'apparaten_index', methods: ['GET'])]
    public function index(ApparatenRepository $apparatenRepository): Response
    {
        return $this->render('apparaten/index.html.twig', [
            'apparatens' => $apparatenRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'apparaten_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $apparaten = new Apparaten();
        $form = $this->createForm(ApparatenType::class, $apparaten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($apparaten);
            $entityManager->flush();

            return $this->redirectToRoute('apparaten_index');
        }

        return $this->render('apparaten/new.html.twig', [
            'apparaten' => $apparaten,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'apparaten_show', methods: ['GET'])]
    public function show(Apparaten $apparaten): Response
    {
        return $this->render('apparaten/show.html.twig', [
            'apparaten' => $apparaten,
        ]);
    }

    #[Route('/pdf/{id}', name: 'apparaten_pdf', methods: ['GET'])]
    public function showPDF(Apparaten $apparaten)
    {

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('apparaten/pdf.html.twig', [
            'title' => "Welcome to our PDF Test"
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("pdf.pdf", [
            "Attachment" => false
        ]);exit(0);
    }

    #[Route('/{id}/edit', name: 'apparaten_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Apparaten $apparaten): Response
    {
        $form = $this->createForm(ApparatenType::class, $apparaten);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('apparaten_index');
        }

        return $this->render('apparaten/edit.html.twig', [
            'apparaten' => $apparaten,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'apparaten_delete', methods: ['DELETE'])]
    public function delete(Request $request, Apparaten $apparaten): Response
    {
        if ($this->isCsrfTokenValid('delete'.$apparaten->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($apparaten);
            $entityManager->flush();
        }

        return $this->redirectToRoute('apparaten_index');
    }
}
