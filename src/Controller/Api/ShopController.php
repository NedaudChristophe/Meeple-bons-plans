<?php

namespace App\Controller\Api;

use Exception;
use App\Entity\Shop;
use App\Repository\ShopRepository;

// use Doctrine\Persistence\ManagerRegistry;
// use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
// use Symfony\Component\Serializer\SerializerInterface;
// use Symfony\Component\Validator\Validator\ValidatorInterface;
// use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/api/shops",name="api_shops_")
 */
class ShopController extends ApiController
{
    /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("", name="browse", methods={"GET"}))
     */
    public function browse(ShopRepository $shopRepository): JsonResponse
    {
        $allShop = $shopRepository->findShopOrderByName();

        return $this->json(
            
            $allShop,
            
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_shops_browse"
                ]
            ]
        );
    }

    /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("/{id}",name="read", methods={"GET"})
     */
    public function read(Shop $shop = null)
    {
        
        if ($shop === null) {
            
            return $this->json(
                [
                    "erreur" => "L'utilisateur n'a pas été trouvé",
                    "code_error" => 404
                ],
                Response::HTTP_NOT_FOUND, // 404
                
            );
        }
        return $this->json(
            $shop, 
            
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_shops_read"
                ]
            ]
        );
      // dd($shop);
    }

    // /**
    //  * @Route("",name="add", methods={"POST"})
    //  * //@IsGranted("ROLE_MANAGER")
    //  *
    //  * @param Request $request
    //  * @param ShopRepository $repo
    //  * @return JsonResponse
    //  */
    // public function add(
    //     Request $request,
    //     ShopRepository $repo,
    //     SerializerInterface $serializerInterface,
    //     ValidatorInterface $validator
    //     ): JsonResponse
    // {
        
        

        
    //     $jsonContent = $request->getContent();
    //     // dd($jsonContent);
        
    //     try 
    //     {
    //         /** @var Shop $newShop */
    //         $newShop = $serializerInterface->deserialize($jsonContent, Shop::class, 'json');
    //     }
    //     catch(Exception $e) 
    //     {
    //         //dd($e);
            
    //         return $this->json("Le JSON est mal formé", Response::HTTP_BAD_REQUEST);
    //     }
    //    // dd($newShop);

        
    //     $errors = $validator->validate($newShop);
        
    //     if (count($errors)> 0)
    //     {
    //         //dd($errors);
    //         // TODO : à améliorer, car illisible
    //         return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
    //     }

        
    //     $repo->add($newShop, true);

        
    //     return $this->json(
            
    //         $newShop,
    //         Response::HTTP_CREATED,
    //         [
                
    //             'Location' => $this->generateUrl('api_shops_read', ['id' => $newShop->getId()])
    //         ],
    //         [
                
    //             "groups" =>"api_shops_read"
               
    //         ]
                
                    
    //     );
    // }


    // /**
    //  * @Route("/{id}",name="edit", 
    //  *      methods={"PUT", "PATCH"},
    //  *      requirements={"id"="\d+"})
    //  */
    // public function edit(
    //     Shop $shop = null,
    //     Request $request,
    //     ManagerRegistry $doctrine,
    //     SerializerInterface $serializerInterface
    //     ): JsonResponse
    // {
    //     //dd($shop);
        
    //     if ($shop === null){ return $this->json404(); }

    //    // dd($shop);
    //     $jsonContent = $request->getContent();
    //     // dump($jsonContent);
        
    //     $serializerInterface->deserialize(
    //         $jsonContent,
    //         Shop::class, 
    //         'json', 
    //         [AbstractNormalizer::OBJECT_TO_POPULATE => $shop]
    //     );
    //     // dump($user);
        
    //     $doctrine->getManager()->flush();
        
    //     return $this->json(
            
    //         $shop,
    //         Response::HTTP_PARTIAL_CONTENT,
    //         [
              
    //             'Location' => $this->generateUrl('api_users_read', ['id' => $shop->getId()])
    //         ],
    //         [
    //             "groups" => "api_shops_read"
    //         ]
    //     );
    // }

    // /**
    //  * @Route("/{id}",name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
    //  *
    //  * @param Shop $shop
    //  */
    // public function delete(Shop $shop = null, ShopRepository $repo)
    // {
       
    //     if ($shop === null) {
    //         return $this->json404();
    //     }
        
        
    //     $repo->remove($shop, true);

    //     return $this->json(
    //         null,
    //         Response::HTTP_NO_CONTENT,
    //         [
                
    //             'Location' => $this->generateUrl('api_shops_browse')
    //         ]
    //     );
    // }
}
 
