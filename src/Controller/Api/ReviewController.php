<?php

namespace App\Controller\Api;

use Exception;
use App\Entity\Review;
use App\Repository\ReviewRepository;

// use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/api/reviews",name="api_reviews_")
 */
class ReviewController extends ApiController
{
    /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("", name="browse", methods={"GET"}))
     */
    public function browse(ReviewRepository $reviewRepository): JsonResponse
    {
        $allReview = $reviewRepository->findAll();

        return $this->json(
            
            $allReview,
            
            Response::HTTP_OK,
            [],
            [
                
                "groups" =>
                [
                    "api_reviews_browse"
                ]
            ]
        );
    }
            
            

    /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("/{id}",name="read", methods={"GET"})
     */
    public function read(Review $review = null)
    {
       
        if ($review === null) {
            
            return $this->json(
                [
                    "erreur" => "Le vote n'a pas été trouvé",
                    "code_error" => 404
                ],
                Response::HTTP_NOT_FOUND, 
                
            );
        }
        return $this->json(
            $review, 
             
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_reviews_read"
                ]
            ]
        );
      // dd($review);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("",name="add", methods={"POST"})
     * //@IsGranted("ROLE_MANAGER")
     *
     * @param Request $request
     * @param ReviewRepository $repo
     * @return JsonResponse
     */
    public function add(
        Request $request,
        ReviewRepository $repo,
        SerializerInterface $serializerInterface,
        ValidatorInterface $validator
        ): JsonResponse
    {

        

        
        $jsonContent = $request->getContent();
        
        try 
        {
            /** @var Review $newReview */
            $newReview = $serializerInterface->deserialize($jsonContent, Review::class, 'json');
        }
        catch(Exception $e) 
        {
            
            return $this->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
       // dd($newReview);

        
        $errors = $validator->validate($newReview);
        
        if (count($errors)> 0)
        {
            //dd($errors);
            
            return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        
        $repo->add($newReview, true);

        
        
        return $this->json(
            
            $newReview,
            Response::HTTP_CREATED,
            [
               
                'Location' => $this->generateUrl('api_reviews_read', ['id' => $newReview->getId()])
            ],
            [
                
                "groups" =>"api_reviews_read"
               
            ]
                
                    
        );
    }


    // /**
    //  * @Route("/{id}",name="edit", 
    //  *      methods={"PUT", "PATCH"},
    //  *      requirements={"id"="\d+"})
    //  */
    // public function edit(
    //     Review $review = null,
    //     Request $request,
    //     ManagerRegistry $doctrine,
    //     SerializerInterface $serializerInterface
    //     ): JsonResponse
    // {
    //     //dd($deal);
        
    //     if ($review === null){ return $this->json404(); }

    //    // dd($casting);
    //     $jsonContent = $request->getContent();
    //     // dump($jsonContent);
        
    //     $serializerInterface->deserialize(
    //         $jsonContent,
    //         Review::class, 
    //         'json', 
    //         [AbstractNormalizer::OBJECT_TO_POPULATE => $review]
    //     );
    //     // dump($review);
        
    //     $doctrine->getManager()->flush();
        
    //     return $this->json(
            
    //         $review,
    //         Response::HTTP_PARTIAL_CONTENT,
    //         [
                
    //             'Location' => $this->generateUrl('api_reviews_read', ['id' => $review->getId()])
    //         ],
    //         [
    //             "groups" => "api_reviews_read"
    //         ]
    //     );
    // }

    
}
 

