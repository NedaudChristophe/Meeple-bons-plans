<?php

namespace App\Controller\Api;

use Exception;
use App\Entity\Article;
use App\Repository\ArticleRepository;

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
 * @Route("/api/articles",name="api_articles_")
 */
class ArticleController extends ApiController
{
    /**
     * @Route("", name="browse", methods={"GET"}))
     */
    public function browse(articleRepository $articleRepository): JsonResponse
    {
        $allArticle = $articleRepository->findAll();

        return $this->json(
            
            $allArticle,
            
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_articles_browse"
                ]
            ]
        );
    }

    /**
     * @Route("/{id}",name="read", methods={"GET"})
     */
    public function read(Article $article = null)
    {
        
        if ($article === null) {
            
            return $this->json(
                [
                    "erreur" => "L'article' n'a pas été trouvé",
                    "code_error" => 404
                ],
                Response::HTTP_NOT_FOUND, // 404
                
            );
        }
        return $this->json(
            $article, 
            
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_articles_read"
                ]
            ]
        );
      // dd($article);
    }

}
