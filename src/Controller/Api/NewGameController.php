<?php

namespace App\Controller\Api;

use Exception;
use App\Entity\NewGame;
use App\Repository\NewGameRepository;

// use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
// use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
* @Route("/api/new/game", name="api_new_game_")
*/
class NewGameController extends ApiController
{
    

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/{id}",name="read", methods={"GET"})
     */
    public function read(NewGame $newGame = null)
    {
        
        //! il faut donc que l'on gère ce cas là
        if ($newGame === null) {
            
            return $this->json(
                [
                    "erreur" => "Le nouveau jeu n'a pas été trouvée",
                    "code_error" => 404
                ],
                Response::HTTP_NOT_FOUND, // 404
                
            );
        }
        return $this->json(
            $newGame, 
            
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_new_games_read"
                ]
            ]
        );
      // dd($newGame);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("",name="add", methods={"POST"})
     * //@IsGranted("ROLE_MANAGER")
     *
     * @param Request $request
     * @param NewGameRepository $repo
     * @return JsonResponse
     */
    public function add(
        Request $request,
        NewGameRepository $repo,
        SerializerInterface $serializerInterface,
        ValidatorInterface $validator
        ): JsonResponse
    {
        
        

        
        $jsonContent = $request->getContent();
        // dd($jsonContent);
        
        try 
        {
            /** @var NewGame $newGame */
            $newGame = $serializerInterface->deserialize($jsonContent, NewGame::class, 'json');
        }
        catch(Exception $e) 
        {
            //dd($e);
            
            return $this->json("Le JSON est mal formé", Response::HTTP_BAD_REQUEST);
        }
       // dd($newGame);

        
        $errors = $validator->validate($newGame);
        
        if (count($errors)> 0)
        {
            //dd($errors);
            
            return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        
        $repo->add($newGame, true);

        
        
        return $this->json(
            
            $newGame,
            Response::HTTP_CREATED,
            [
                
                'Location' => $this->generateUrl('api_new_game_read', ['id' => $newGame->getId()])
            ],
            [
                
                "groups" =>"api_new_games_read"
               
            ]
                
                    
        );
    }


    
}
 

