<?php

namespace App\Controller\Api;

use DateTime;
use Exception;
use App\Entity\User;

use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/api/users",name="api_users_")
 */
class UserController extends ApiController
{   
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }    


    /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("", name="browse", methods={"GET"}))
     */
    public function browse(UserRepository $userRepository): JsonResponse
    {
        $allUser = $userRepository->findAll();

        return $this->json(
            
            $allUser,
            
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_users_browse"
                ]
            ]
        );
    }

    /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("/{id}",name="read", methods={"GET"})
     */
    public function read(User $user = null)
    {
        
        if ($user === null) {
            
            return $this->json(
                [
                    "erreur" => "L'utilisateur n'a pas été trouvé",
                    "code_error" => 404
                ],
                Response::HTTP_NOT_FOUND, // 404
                
            );
        }
        return $this->json(
            $user, 
            
            Response::HTTP_OK,
            
            [],
            
            [
                
                "groups" =>
                [
                    "api_users_read"
                ]
            ]
        );
      // dd($user);
    }

    /**
     * @IsGranted("PUBLIC_ACCESS")
     * @Route("",name="add", methods={"POST"})
     * //@IsGranted("ROLE_MANAGER")
     *
     * @param Request $request
     * @param UserRepository $repo
     * @return JsonResponse
     */
    public function add(
        Request $request,
        UserRepository $repo,
        SerializerInterface $serializerInterface,
        ValidatorInterface $validator,
        UserPasswordHasherInterface $hasher
        ): JsonResponse
    {
        
        

        
        $jsonContent = $request->getContent();
        
        
        try 
        {
            /** @var User $newuser */
            $newUser = $serializerInterface->deserialize($jsonContent, User::class, 'json');
        }
        catch(Exception $e) 
        {
            
            return $this->json("Le JSON est mal formé", Response::HTTP_BAD_REQUEST);
        }
       // dd($newUser);

        
        $errors = $validator->validate($newUser);
        
        if (count($errors)> 0)
        {
            //dd($errors);
            
            return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        //set slug name on user creation
        $newUser->setSlug(strtolower($this->slugger->slug($newUser->getName())));

        // Set created Date
        $newUser->setCreatedAt(new DateTime('now'));
        $newUser->setIsActive(true);
        $newUser->setRoles(['ROLE_USER']);
        //hash password
        $plaintextPassword = $newUser->getPassword();
            
            $hashedPassword = $hasher->hashPassword(
                $newUser,
                $plaintextPassword
            );
            $newUser->setPassword($hashedPassword);

        $repo->add($newUser, true);

        
        return $this->json(
            
            $newUser,
            Response::HTTP_CREATED,
            [
                
                'Location' => $this->generateUrl('api_users_read', ['id' => $newUser->getId()])
            ],
            [
                
                "groups" =>"api_users_read"
               
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
        User $user = null,
        Request $request,
        ManagerRegistry $doctrine,
        SerializerInterface $serializerInterface,
        UserPasswordHasherInterface $hasher
        ): JsonResponse
    {
        //dd($user);
        
        if ($user === null){ return $this->json404(); }

       // dd($user);
        $jsonContent = $request->getContent();
        // dump($jsonContent);
        
        $serializerInterface->deserialize(
            $jsonContent,
            User::class, 
            'json', 
            [AbstractNormalizer::OBJECT_TO_POPULATE => $user]
        );
        // dump($user);

        //set slug name on user edit
        $user->setSlug(strtolower($this->slugger->slug($user->getName())));

        
        // Set updated Date
        $user->setUpdatedAt(new DateTime('now'));
        $user->setRoles(['ROLE_USER']);

        $plaintextPassword = $user->getPassword();
            
            $hashedPassword = $hasher->hashPassword(
                $user,
                $plaintextPassword
            );
            $user->setPassword($hashedPassword);
        $doctrine->getManager()->flush();
        
        return $this->json(
            
            $user,
            Response::HTTP_PARTIAL_CONTENT,
            [
                
                'Location' => $this->generateUrl('api_users_read', ['id' => $user->getId()])
            ],
            [
                "groups" => "api_users_read"
            ]
        );
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/{id}",name="delete", methods={"DELETE"}, requirements={"id"="\d+"})
     *
     * @param User $user
     */
    public function delete(User $user = null, UserRepository $repo)
    {
        
        if ($user === null) {
            return $this->json404();
        }
        
        
        $repo->remove($user, true);

        return $this->json(
            null,
            Response::HTTP_NO_CONTENT,
            [
                
                'Location' => $this->generateUrl('api_users_browse')
            ]
        );
    }


    /**
     * @IsGranted("ROLE_USER")
     * @Route("/custom",name="custom", methods={"POST"})
     * @param Request $request
     * @param UserRepository $userRepository
     * @param SerializerInterface $serializerInterface
     */
    public function findUserByEmail(
        Request $request,
        UserRepository $userRepository,
        SerializerInterface $serializerInterface
        )
    {
        
        $jsonContent = $request->getContent();

        /** @var User $user */
        $user= $serializerInterface->deserialize(
            $jsonContent,
            User::class, 
            'json',
        );

        $email= $user->getEmail();

        $users = $userRepository->findUserByEmail($email);
        
        return $this->json(
            $users,

        
            Response::HTTP_OK,
            [

            ],
            [
                "groups" =>"api_users_custom"
            ]
                
                    
        );
    }
}
 