<?php

namespace App\Controller\Back;

use DateTime;
use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @IsGranted("ROLE_MANAGER")
 * @Route("/back/article")
 */
class ArticleController extends AbstractController
{   

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }    
    
    /**
     * @Route("/", name="app_back_article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('back/article/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/new", name="app_back_article_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ArticleRepository $articleRepository): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $article->setSlug(strtolower($this->slugger->slug($article->getTitle())));
            // Set created Date
            $article->setCreatedAt(new DateTime('now'));
            $articleRepository->add($article, true);

            return $this->redirectToRoute('app_back_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/article/new.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_article_show", methods={"GET"})
     */
    public function show(Article $article): Response
    {
        return $this->render('back/article/show.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/{id}/edit", name="app_back_article_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Article $article, ArticleRepository $articleRepository): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $article->setSlug(strtolower($this->slugger->slug($article->getTitle())));
           
            // Set uptated Date
            $article->setUpdatedAt(new DateTime('now'));
            $articleRepository->add($article, true);

            return $this->redirectToRoute('app_back_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/article/edit.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/{id}", name="app_back_article_delete", methods={"POST"})
     */
    public function delete(Request $request, Article $article, ArticleRepository $articleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $articleRepository->remove($article, true);
        }

        return $this->redirectToRoute('app_back_article_index', [], Response::HTTP_SEE_OTHER);
    }
}
