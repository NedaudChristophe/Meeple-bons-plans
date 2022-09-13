<?php

namespace App\Controller\Api;

use Exception;
use App\Entity\Category;
use App\Repository\CategoryRepository;

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
 * @IsGranted("PUBLIC_ACCESS")
 * @Route("/api/categories",name="api_categories_")
 */
class CategoryController extends ApiController
{
    /**
     * @Route("", name="browse", methods={"GET"}))
     */
    public function browse(CategoryRepository $categoryRepository): JsonResponse
    {
        $allCategory = $categoryRepository->findAll();

        return $this->json(
            // data
            $allCategory,
             
            Response::HTTP_OK,
            
            [],
            
            [
               
                "groups" =>
                [
                    "api_categories_browse"
                ]
            ]
        );
    }

    /**
     * @Route("/{id}",name="read", methods={"GET"})
     */
    public function read(Category $category = null)
    {
        
        if ($category === null) {
            
            return $this->json(
                [
                    "erreur" => "La catégorie n'a pas été trouvée",
                    "code_error" => 404
                ],
                Response::HTTP_NOT_FOUND, // 404
                
            );
        }
        return $this->json(
            $category, 
             
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_categories_read"
                ]
            ]
        );
      // dd($category);
    }

    // /**
    //  * @Route("",name="add", methods={"POST"})
    //  * //@IsGranted("ROLE_MANAGER")
    //  *
    //  * @param Request $request
    //  * @param CategoryRepository $repo
    //  * @return JsonResponse
    //  */
    // public function add(
    //     Request $request,
    //     CategoryRepository $repo,
    //     SerializerInterface $serializerInterface,
    //     ValidatorInterface $validator
    //     ): JsonResponse
    // {
        
        

        
    //     $jsonContent = $request->getContent();
        
    //     try 
    //     {
    //         /** @var Category $newCategory */
    //         $newCategory = $serializerInterface->deserialize($jsonContent, Category::class, 'json');
    //     }
    //     catch(Exception $e) 
    //     {
    //         //dd($e);
            
    //         return $this->json("Le JSON est mal formé", Response::HTTP_BAD_REQUEST);
    //     }
       

        
    //     $errors = $validator->validate($newCategory);
        
    //     if (count($errors)> 0)
    //     {
    //         //dd($errors);
            
    //         return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
    //     }

        
    //     $repo->add($newCategory, true);

        
    //     return $this->json(
            
    //         $newCategory,
    //         Response::HTTP_CREATED,
    //         [
                
    //             'Location' => $this->generateUrl('api_categories_read', ['id' => $newCategory->getId()])
    //         ],
    //         [
                
    //             "groups" =>"api_categories_read"
               
    //         ]
                
                    
    //     );
    // }


    // /**
    //  * @Route("/{id}",name="edit", 
    //  *      methods={"PUT", "PATCH"},
    //  *      requirements={"id"="\d+"})
    //  */
    // public function edit(
    //     Category $category = null,
    //     Request $request,
    //     ManagerRegistry $doctrine,
    //     SerializerInterface $serializerInterface
    //     ): JsonResponse
    // {
    //     //dd($category);
        
    //     if ($category === null){ return $this->json404(); }

    //    // dd($category);
    //     $jsonContent = $request->getContent();
    //     // dump($jsonContent);
        
    //     $serializerInterface->deserialize(
    //         $jsonContent,
    //         Category::class, 
    //         'json', 
    //         [AbstractNormalizer::OBJECT_TO_POPULATE => $category]
    //     );
        
        
    //     $doctrine->getManager()->flush();
        
    //     return $this->json(
            
    //         $category,
    //         Response::HTTP_PARTIAL_CONTENT,
    //         [
                
    //             'Location' => $this->generateUrl('api_categories_read', ['id' => $category->getId()])
    //         ],
    //         [
    //             "groups" => "api_categories_read"
    //         ]
    //     );
    // }

    // /**
    //  * @Route("/{id}",name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
    //  *
    //  * @param Category $category
    //  */
    // public function delete(Category $category = null, CategoryRepository $repo)
    // {
        
    //     if ($category === null) {
    //         return $this->json404();
    //     }
        
        
    //     $repo->remove($category, true);

    //     return $this->json(
    //         null,
    //         Response::HTTP_NO_CONTENT,
    //         [
                
    //             'Location' => $this->generateUrl('api_categories_browse')
    //         ]
    //     );
    // }
}
 

