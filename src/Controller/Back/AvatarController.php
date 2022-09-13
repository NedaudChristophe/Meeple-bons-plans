<?php

namespace App\Controller\Back;

use App\Entity\Avatar;
use App\Form\AvatarType;
use App\Repository\AvatarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_MANAGER")
 * @Route("/back/avatar")
 */
class AvatarController extends AbstractController
{
    /**
     * @Route("/", name="app_back_avatar_index", methods={"GET"})
     */
    public function index(AvatarRepository $avatarRepository): Response
    {
        return $this->render('back/avatar/index.html.twig', [
            'avatars' => $avatarRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/new", name="app_back_avatar_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AvatarRepository $avatarRepository): Response
    {
        $avatar = new Avatar();
        $form = $this->createForm(AvatarType::class, $avatar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $avatarRepository->add($avatar, true);

            return $this->redirectToRoute('app_back_avatar_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/avatar/new.html.twig', [
            'avatar' => $avatar,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_avatar_show", methods={"GET"})
     */
    public function show(Avatar $avatar): Response
    {
        return $this->render('back/avatar/show.html.twig', [
            'avatar' => $avatar,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/{id}/edit", name="app_back_avatar_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Avatar $avatar, AvatarRepository $avatarRepository): Response
    {
        $form = $this->createForm(AvatarType::class, $avatar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $avatarRepository->add($avatar, true);

            return $this->redirectToRoute('app_back_avatar_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/avatar/edit.html.twig', [
            'avatar' => $avatar,
            'form' => $form,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN") 
     * @Route("/{id}", name="app_back_avatar_delete", methods={"POST"})
     */
    public function delete(Request $request, Avatar $avatar, AvatarRepository $avatarRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avatar->getId(), $request->request->get('_token'))) {
            $avatarRepository->remove($avatar, true);
        }

        return $this->redirectToRoute('app_back_avatar_index', [], Response::HTTP_SEE_OTHER);
    }
}
