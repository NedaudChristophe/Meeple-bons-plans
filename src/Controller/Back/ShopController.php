<?php

namespace App\Controller\Back;

use DateTime;
use App\Entity\Shop;
use App\Form\ShopType;
use App\Repository\ShopRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_MANAGER")
 * @Route("/back/shop")
 */
class ShopController extends AbstractController
{   

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }    

    
    /**
     * @Route("/", name="app_back_shop_index", methods={"GET"})
     */
    public function index(ShopRepository $shopRepository): Response
    {
        return $this->render('back/shop/index.html.twig', [
            'shops' => $shopRepository->findShopOrderByName(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/new", name="app_back_shop_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ShopRepository $shopRepository): Response
    {
        $shop = new Shop();
        $form = $this->createForm(ShopType::class, $shop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // set slug shop name on shop creation
            $shop->setSlug(strtolower($this->slugger->slug($shop->getName())));

            // Set created Date
            $shop->setCreatedAt(new DateTime('now'));
            $shopRepository->add($shop, true);

            return $this->redirectToRoute('app_back_shop_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/shop/new.html.twig', [
            'shop' => $shop,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_shop_show", methods={"GET"})
     */
    public function show(Shop $shop): Response
    {
        return $this->render('back/shop/show.html.twig', [
            'shop' => $shop,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/{id}/edit", name="app_back_shop_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Shop $shop, ShopRepository $shopRepository): Response
    {
        $form = $this->createForm(ShopType::class, $shop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // set slug shop name on shop edit
            $shop->setSlug(strtolower($this->slugger->slug($shop->getName())));
            // Set updated Date
            $shop->setUpdatedAt(new DateTime('now'));
            $shopRepository->add($shop, true);

            return $this->redirectToRoute('app_back_shop_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/shop/edit.html.twig', [
            'shop' => $shop,
            'form' => $form,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/{id}", name="app_back_shop_delete", methods={"POST"})
     */
    public function delete(Request $request, Shop $shop, ShopRepository $shopRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$shop->getId(), $request->request->get('_token'))) {
            $shopRepository->remove($shop, true);
        }

        return $this->redirectToRoute('app_back_shop_index', [], Response::HTTP_SEE_OTHER);
    }
}
