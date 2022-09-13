<?php

namespace App\Controller\Back;

use DateTime;
use App\Entity\Game;
use App\Form\GameType;
use App\Repository\GameRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_MANAGER")
 * @Route("/back/game")
 */
class GameController extends AbstractController
{
    /**
     * @Route("/", name="app_back_game_index", methods={"GET"})
     */
    public function index(GameRepository $gameRepository): Response
    {
        return $this->render('back/game/index.html.twig', [
            'games' => $gameRepository->findGameOrderByName(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/new", name="app_back_game_new", methods={"GET", "POST"})
     */
    public function new(Request $request, GameRepository $gameRepository): Response
    {
        $game = new Game();
        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Set created Date
            $game->setCreatedAt(new DateTime('now'));
            $gameRepository->add($game, true);

            return $this->redirectToRoute('app_back_game_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/game/new.html.twig', [
            'game' => $game,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_game_show", methods={"GET"})
     */
    public function show(Game $game): Response
    {
        return $this->render('back/game/show.html.twig', [
            'game' => $game,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/{id}/edit", name="app_back_game_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Game $game, GameRepository $gameRepository): Response
    {
        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Set updated Date
            $game->setUpdatedAt(new DateTime('now'));
            $gameRepository->add($game, true);

            return $this->redirectToRoute('app_back_game_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/game/edit.html.twig', [
            'game' => $game,
            'form' => $form,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/{id}", name="app_back_game_delete", methods={"POST"})
     */
    public function delete(Request $request, Game $game, GameRepository $gameRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$game->getId(), $request->request->get('_token'))) {
            $gameRepository->remove($game, true);
        }

        return $this->redirectToRoute('app_back_game_index', [], Response::HTTP_SEE_OTHER);
    }
}
