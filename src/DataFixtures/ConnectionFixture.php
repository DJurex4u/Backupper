<?php

namespace App\DataFixtures;

use App\Entity\BData;
use App\Entity\BDatabase;
use App\Entity\Connection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ConnectionFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $numOfUsers = 10;
        $bData = new BData();
        $bDatabase = new BDatabase();



        for ($i = 0; $i < $numOfUsers; $i++) {
            $connection = new Connection();
            $connection->setUsername(substr(md5(mt_rand()), 0, 7));
            $connection->setPassword('1234');
            $connection->setBData($bData);
            $connection->setBDatabase($bDatabase);
            $port = rand(1,100);
            $connection->setPort($port);
            $connection->setProject($this->getReference('project_'. $i));

            $manager->persist($connection);
        }

        $manager->flush();
    }
}
