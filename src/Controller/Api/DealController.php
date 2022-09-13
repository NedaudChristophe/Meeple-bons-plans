<?php

namespace App\Controller\Api;

use DateTime;
use Exception;
use App\Entity\Deal;

use App\Repository\DealRepository;
use App\Repository\ReviewRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;



/**
 * @Route("/api/deals",name="api_deals_")
 */
class DealController extends ApiController
{

    /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("", name="browse", methods={"GET"}))
     */
    public function browse(DealRepository $dealRepository): JsonResponse
    {
        $allDeal = $dealRepository->findDealOrderByCreatedAt();

        return $this->json(
            
            $allDeal,
            
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_deals_browse"
                ]
            ]
        );
    }

    /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("/{id}",name="read", methods={"GET"})
     */
    public function read($id, Deal $deal = null, ReviewRepository $review)
    {
        $fire = $review->findCountFlamme($id);
        $ice = $review->findCountIce($id);

        if ($deal === null) {
            
            return $this->json(
                [
                    "erreur" => "Le bon plan n'a pas été trouvé",
                    "code_error" => 404
                ],
                Response::HTTP_NOT_FOUND, // 404
                
            );
        }
        return $this->json(
            $deal=[
                'deal' => $deal,
                'fire'=> $fire,
                'ice'=> $ice
            ] , 
             
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_deals_read"
                ]
            ]
        );
      // dd($deal);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("",name="add", methods={"POST"})
     * //@IsGranted("ROLE_MANAGER")
     *
     * @param Request $request
     * @param DealRepository $repo
     * @return JsonResponse
     */
    public function add(
        Request $request,
        DealRepository $repo,
        SerializerInterface $serializerInterface,
        ValidatorInterface $validator
        ): JsonResponse
    {
        
        $jsonContent = $request->getContent();
        // dd($jsonContent);
        
        try 
        {
            /** @var Deal $newDeal */
            $newDeal = $serializerInterface->deserialize($jsonContent, Deal::class, 'json');
            // dd($newDeal);
        }
        
        catch(Exception $e) 
        {
            //dd($e);
            
            return $this->json("Le JSON est mal formé", Response::HTTP_BAD_REQUEST);
        }
       // dd($newDeal);

        
        $errors = $validator->validate($newDeal);
        
        if (count($errors)> 0)
        {
            //dd($errors);
            
            return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        
        // Set created Date
        $newDeal->setCreatedAt(new DateTime('now'));
        $newDeal->setStatus(0);
        
        $repo->add($newDeal, true);

        
        return $this->json(
            
            $newDeal,
            Response::HTTP_CREATED,
            [
                
                'Location' => $this->generateUrl('api_deals_read', ['id' => $newDeal->getId()])
            ],
            [
                
                "groups" =>"api_deals_read"
               
            ]
                
                    
        );
    }


    /**
     * @IsGranted("ROLE_USER")
     * @Route("/{id}",name="edit", 
     *      methods={"PUT", "PATCH"},
     *      requirements={"id"="\d+"})
     */
    public function edit(
        Deal $deal = null,
        Request $request,
        ManagerRegistry $doctrine,
        SerializerInterface $serializerInterface
        ): JsonResponse
    {
        //dd($deal);
        
        if ($deal === null){ return $this->json404(); }

       // dd($deal);
        $jsonContent = $request->getContent();
        // dump($jsonContent);
        
        $serializerInterface->deserialize(
            $jsonContent,
            Deal::class, 
            'json', 
            [AbstractNormalizer::OBJECT_TO_POPULATE => $deal]
        );
        // dump($deal);
        
        $doctrine->getManager()->flush();
        
        return $this->json(
            
            $deal,
            Response::HTTP_PARTIAL_CONTENT,
            [
                
                'Location' => $this->generateUrl('api_deals_read', ['id' => $deal->getId()])
            ],
            [
                "groups" => "api_deals_read"
            ]
        );
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/{id}",name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     *
     * @param Deal $deal
     */
    public function delete(Deal $deal = null, DealRepository $repo)
    {
        
        if ($deal === null) {
            return $this->json404();
        }
        
        
        $repo->remove($deal, true);

        return $this->json(
            null,
            Response::HTTP_NO_CONTENT,
            [
                
                'Location' => $this->generateUrl('api_deals_browse')
            ]
        );
    }


   
}
 
