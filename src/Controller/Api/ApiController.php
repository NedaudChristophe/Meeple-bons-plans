<?php

namespace App\Controller\Api;

use App\Model\JsonError;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends AbstractController
{
    public function json404(string $message = 'not found')
    {
        // on renvoie donc une 404
        $error = new JsonError($message, 404);

        return $this->json(
            $error,
            Response::HTTP_NOT_FOUND, // 404
            // les autres paramètres sont inutiles
        );
    }

    public function json200($data, $groups)
    {
        return $this->json(
            $data,
            // code HTTP pour dire que tout se passe bien (200) 
            Response::HTTP_OK,
            // les entêtes HTTP, on les utilise dans très peu de cas, donc valeur par défaut : []
            [],
            // le contexte, on l'utilise pour spécifier les groupes de serialisation
            $groups
        );
    }

    public function json201($data, string $group)
    {
        return $this->json(
            $data,
            201,
            [],
            [
                "groups" =>
                [
                    $group
                ]
            ]
        );
    }


    public function json422($errors, $data)
    {
        $messages = [];

        for ($i = 0; $i < count($errors); $i++) {
            $messages['error' . $i] = $errors[$i]->getMessage();
        }

        return $this->json(
            [$data, $messages],
            422
        );
    }

    public function json403()
    {
        $error = new JsonError('Vous n\'avez pas les droits', 403);

        return $this->json(
            $error
        );
    }
}
