<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

const NUM_OF_USERS = 10; //not used yet

class UserFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $numOfUsers = 10;
        $myRole = new Role();
        $allRoles = array("ROLE_ADMIN", "ROLE_USER");


        for ($i = 0; $i < $numOfUsers; $i++) {
            $user = new User();
            $user->setEmail(substr(md5(mt_rand()), 0, 7) . '@gmail.com');
            $user->setPassword(
                $this->encoder->encodePassword($user, '1234')
            );
            $myRole->setName($allRoles[rand(0, 1)]);
            $user->setRole($myRole);
            $user->setCredentials("Mr.Dr.Sc.");

            $manager->persist($myRole);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
