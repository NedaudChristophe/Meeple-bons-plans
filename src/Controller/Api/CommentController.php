<?php

namespace App\Controller\Api;

use DateTime;
use Exception;
use App\Entity\Comment;

use App\Repository\CommentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;


/**
 * @IsGranted("PUBLIC_ACCESS")
 * @Route("/api/comments",name="api_comments_")
 */
class CommentController extends ApiController
{
    /**
     * @Route("", name="browse", methods={"GET"}))
     */
    public function browse(CommentRepository $commentRepository): JsonResponse
    {
        $allComment = $commentRepository->findAll();

        return $this->json(
            
            $allComment,
            
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_comments_browse"
                ]
            ]
        );
    }

    /**
     * @Route("/{id}",name="read", methods={"GET"})
     */
    public function read(Comment $comment = null)
    {
        
        if ($comment === null) {
           
            return $this->json(
                [
                    "erreur" => "Le commentaire n'a pas été trouvé",
                    "code_error" => 404
                ],
                Response::HTTP_NOT_FOUND, // 404
                
            );
        }
        return $this->json(
            $comment, 
            
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_comments_read"
                ]
            ]
        );
      // dd($comment);
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
        CommentRepository $repo,
        SerializerInterface $serializerInterface,
        ValidatorInterface $validator
        ): JsonResponse
    {
        
        

        // TODO : récuperer les infos dans le body/content de la requete
        $jsonContent = $request->getContent();
        // dd($jsonContent);
        
        try 
        {
            /** @var Comment $newComment */
            $newComment = $serializerInterface->deserialize($jsonContent, Comment::class, 'json');
        }
        catch(Exception $e) 
        {
            //dd($e);
            
            return $this->json("Le JSON est mal formé", Response::HTTP_BAD_REQUEST);
        }
       // dd($newComment);

        
        $errors = $validator->validate($newComment);
        
        if (count($errors)> 0)
        {
            //dd($errors);
            // TODO : à améliorer, car illisible
            return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        // Set created Date
        $newComment->setCreatedAt(new DateTime('now'));

        
        $repo->add($newComment, true);

        
        return $this->json(
            
            $newComment,
            Response::HTTP_CREATED,
            [
                
                'Location' => $this->generateUrl('api_comments_read', ['id' => $newComment->getId()])
            ],
            [
                
                "groups" =>"api_comments_read"
               
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
        Comment $comment = null,
        Request $request,
        ManagerRegistry $doctrine,
        SerializerInterface $serializerInterface
        ): JsonResponse
    {
        //dd($comment);
        
        if ($comment === null){ return $this->json404(); }

       // dd($casting);
        $jsonContent = $request->getContent();
        
        $serializerInterface->deserialize(
            $jsonContent,
            Comment::class, 
            'json', 
            [AbstractNormalizer::OBJECT_TO_POPULATE => $comment]
        );
        // dump($deal);
        
        $doctrine->getManager()->flush();
        
        return $this->json(
            
            $comment,
            Response::HTTP_PARTIAL_CONTENT,
            [
                
                'Location' => $this->generateUrl('api_comments_read', ['id' => $comment->getId()])
            ],
            [
                "groups" => "api_comments_read"
            ]
        );
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/{id}",name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     *
     * @param Comment $comment
     */
    public function delete(Comment $comment = null, CommentRepository $repo)
    {
        
        if ($comment === null) {
            return $this->json404();
        }
        
        
        $repo->remove($comment, true);

        return $this->json(
            null,
            Response::HTTP_NO_CONTENT,
            [
                
                'Location' => $this->generateUrl('api_comments_browse')
            ]
        );
    }
}
 
