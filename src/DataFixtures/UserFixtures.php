<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $userPasswordEncoder;

    /**
     * UserFixtures constructor.
     * @param $userPasswordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }


    public function load(ObjectManager $manager)
    {
        $user = new Client();
        $user->setEmail("admin@meowfood.fr");
        $user->setPassword($this->userPasswordEncoder->encodePassword($user, "Password1"));
        $user->setRoles(array("ROLE_USER"));
        $user->setNom("Jackie");
        $user->setPrenom("Michel");
        $user->setTelephone(0623521524);


        $manager->persist($user);
        $manager->flush();
    }
}
