<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture implements FixtureGroupInterface
{
    
    
    
    
    
    
    public function load(ObjectManager $manager): void
    {   
        
        $user = new User();
        $user->setEmail('admin@admin.com');
        $user->setPassword('admin');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setName('admin');
        $user->setIsActive(1);
        
        $user->setAvatar(1);
        $user->setCreatedAt(new DateTime());
        $manager->persist($user);
        
        
        $user1 = new User();
        $user1->setEmail('user@user.com');
        $user1->setPassword('user');
        $user1->setRoles(['ROLE_USER']);
        $user->setName('user');
        $user->setIsActive(1);
       
        $user->setAvatar(2);
        $user->setCreatedAt(new DateTime());
        $manager->persist($user1);
        
        $user2= new User();
        $user2->setEmail('manager@manager.com');
        $user2->setPassword('manager');
        $user2->setRoles(['ROLE_MANAGER']);
        $user->setName('manager');
        $user->setIsActive(1);
        $user->setCreatedAt(new DateTime());
        
        $user->setAvatar(3);
        $manager->persist($user2);

        
        
        
        $manager->flush();

        

    }



    


    /**
     * Nous permet de classer les fixtures pour pouvoir les éxecuter séparement
     *
     * @return array
     */
    public static function getGroups(): array
     {
         return ['userGroup'];
     }
}
