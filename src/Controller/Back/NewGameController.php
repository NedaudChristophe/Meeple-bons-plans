<?php

namespace App\Controller\Back;

use App\Entity\NewGame;
use App\Form\NewGameType;
use App\Repository\NewGameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_MANAGER")
 * @Route("/back/new/game")
 */
class NewGameController extends AbstractController
{
    /**
     * @Route("/", name="app_back_new_game_index", methods={"GET"})
     */
    public function index(NewGameRepository $newGameRepository): Response
    {
        return $this->render('back/new_game/index.html.twig', [
            'new_games' => $newGameRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/new", name="app_back_new_game_new", methods={"GET", "POST"})
     */
    public function new(Request $request, NewGameRepository $newGameRepository): Response
    {
        $newGame = new NewGame();
        $form = $this->createForm(NewGameType::class, $newGame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newGameRepository->add($newGame, true);

            return $this->redirectToRoute('app_back_new_game_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/new_game/new.html.twig', [
            'new_game' => $newGame,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_new_game_show", methods={"GET"})
     */
    public function show(NewGame $newGame): Response
    {
        return $this->render('back/new_game/show.html.twig', [
            'new_game' => $newGame,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/{id}/edit", name="app_back_new_game_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, NewGame $newGame, NewGameRepository $newGameRepository): Response
    {
        $form = $this->createForm(NewGameType::class, $newGame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newGameRepository->add($newGame, true);

            return $this->redirectToRoute('app_back_new_game_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/new_game/edit.html.twig', [
            'new_game' => $newGame,
            'form' => $form,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/{id}", name="app_back_new_game_delete", methods={"POST"})
     */
    public function delete(Request $request, NewGame $newGame, NewGameRepository $newGameRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$newGame->getId(), $request->request->get('_token'))) {
            $newGameRepository->remove($newGame, true);
        }

        return $this->redirectToRoute('app_back_new_game_index', [], Response::HTTP_SEE_OTHER);
    }
}
