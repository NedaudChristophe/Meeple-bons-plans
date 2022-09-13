<?php

namespace App\Controller\Back;

use DateTime;
use App\Entity\Deal;
use App\Form\DealType;
use App\Repository\DealRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_MANAGER")
 * @Route("/back/deal")
 */
class DealController extends AbstractController
{
    /**
     * @Route("/", name="app_back_deal_index", methods={"GET"})
     */
    public function index(DealRepository $dealRepository): Response
    {
        return $this->render('back/deal/index.html.twig', [
            'deals' => $dealRepository->findDealOrderByCreatedAt(),
        ]);
        
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/new", name="app_back_deal_new", methods={"GET", "POST"})
     */
    public function new(Request $request, DealRepository $dealRepository): Response
    {
        $deal = new Deal();
        $form = $this->createForm(DealType::class, $deal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Set created Date
            $deal->setCreatedAt(new DateTime('now'));
            $dealRepository->add($deal, true);

            return $this->redirectToRoute('app_back_deal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/deal/new.html.twig', [
            'deal' => $deal,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_deal_show", methods={"GET"})
     */
    public function show(Deal $deal): Response
    {
        return $this->render('back/deal/show.html.twig', [
            'deal' => $deal,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/{id}/edit", name="app_back_deal_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Deal $deal, DealRepository $dealRepository): Response
    {
        $form = $this->createForm(DealType::class, $deal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Set updated Date
            $deal->setUpdatedAt(new DateTime('now'));
            $dealRepository->add($deal, true);

            return $this->redirectToRoute('app_back_deal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/deal/edit.html.twig', [
            'deal' => $deal,
            'form' => $form,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/{id}", name="app_back_deal_delete", methods={"POST"})
     */
    public function delete(Request $request, Deal $deal, DealRepository $dealRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$deal->getId(), $request->request->get('_token'))) {
            $dealRepository->remove($deal, true);
        }

        return $this->redirectToRoute('app_back_deal_index', [], Response::HTTP_SEE_OTHER);
    }
}
