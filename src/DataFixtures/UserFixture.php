<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
        $myRole->setName($allRoles[rand(0,1)]);



        for ($i = 0; $i < $numOfUsers; $i++) {
            $user = new User();
            $user->setEmail(substr(md5(mt_rand()), 0, 7) . '@gmail.com');
            $user->setPassword(
                $this->encoder->encodePassword($user, '1234')
            );
            $user->setRole($myRole);
            $user->setCredentials("Mr.Dr.Sc.");

            $manager->persist($myRole);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
