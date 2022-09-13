<?php

namespace App\Controller\Api;

use Exception;
use App\Entity\Game;
use App\Repository\GameRepository;

// use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
// use Symfony\Component\Validator\Validator\ValidatorInterface;
// use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/api/games",name="api_games_")
 */
class GameController extends ApiController
{
    /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("", name="browse", methods={"GET"}))
     */
    public function browse(GameRepository $gameRepository): JsonResponse
    {
        $allGame = $gameRepository->findGameOrderByName();

        return $this->json(
            // data
            $allGame,
             
            Response::HTTP_OK,
            
            [],
            
            [
               
                "groups" =>
                [
                    "api_games_browse"
                ]
            ]
        );
    }


    /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("/{id}",name="read", methods={"GET"})
     */
    public function read(Game $game = null)
    {
        
        if ($game === null) {
            
            return $this->json(
                [
                    "erreur" => "Le jeu n'a pas été trouvée",
                    "code_error" => 404
                ],
                Response::HTTP_NOT_FOUND, // 404
                
            );
        }
        return $this->json(
            $game, 
             
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_games_read"
                ]
            ]
        );
      // dd($game);
    }

    /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("/bynameanddeal",name="bynameanddeal", methods={"POST"})
     * @param Request $request
     * @param GameRepository $gameRepository
     * @param SerializerInterface $serializerInterface
     */
    public function findGameByNameWithDeals(
        Request $request,
        GameRepository $gameRepository,
        SerializerInterface $serializerInterface
        )
    {
        
        $jsonContent = $request->getContent();

        /** @var Game $game */
        $game= $serializerInterface->deserialize(
            $jsonContent,
            Game::class, 
            'json',
        );

        $title = $game->getname();


        $games = $gameRepository->findGameByNameWithDeals($title);
        
        
        return $this->json(
            $games,

        
            Response::HTTP_OK,
            [

            ],
            [
                "groups" =>"api_games_bynameanddeal"
            ]
                
                    
        );
    }

     /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("/byname",name="byname", methods={"POST"})
     * @param Request $request
     * @param GameRepository $gameRepository
     * @param SerializerInterface $serializerInterface
     */
    public function findGameByName(
        Request $request,
        GameRepository $gameRepository,
        SerializerInterface $serializerInterface
        )
    {
        
        $jsonContent = $request->getContent();

        /** @var Game $game */
        $game= $serializerInterface->deserialize(
            $jsonContent,
            Game::class, 
            'json',
        );

        $title = $game->getname();


        $games = $gameRepository->findGameByName($title);
        
        
        return $this->json(
            $games,

        
            Response::HTTP_OK,
            [

            ],
            [
                "groups" =>"api_games_byname"
            ]
                
                    
        );
    }


   
}
 

