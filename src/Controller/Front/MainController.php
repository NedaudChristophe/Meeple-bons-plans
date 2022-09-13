<?php
// src/Controller/Front/MainController.php 
namespace App\Controller\Front;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     * 
     * @return Response
     */
    public function home(): Response
    {   
    
        return $this->redirectToRoute('app_back_deal_index', [], Response::HTTP_SEE_OTHER);
    }

}
