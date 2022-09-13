<?php

namespace App\DataFixtures;

use App\Entity\Avatar;
use App\Form\AvatarType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $avatar = new Avatar();
        $avatar->setImage('https://cdn-icons-png.flaticon.com/512/147/147142.png');
        $manager->persist($avatar);

        $avatar1 = new Avatar();
        $avatar1->setImage('https://cdn-icons-png.flaticon.com/512/168/168732.png');
        $manager->persist($avatar1);

        $avatar2 = new Avatar();
        $avatar2->setImage('https://cdn-icons-png.flaticon.com/512/163/163834.png');
        $manager->persist($avatar2);

        $avatar3 = new Avatar();
        $avatar3->setImage('https://cdn-icons-png.flaticon.com/512/4509/4509555.png');
        $manager->persist($avatar3);

        //$manager->flush();
    }
}
