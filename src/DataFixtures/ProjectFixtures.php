<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $numOfUsers = 10;


        for ($i = 0; $i < $numOfUsers; $i++) {
            $project = new Project();
            $project->setName(substr(md5(mt_rand()), 0, 7));
            $project->setKeepAmount(3);
            $project->setPersonInCharge(substr(md5(mt_rand()), 0, 7));

            $manager->persist($project);
        }

        $manager->flush();
    }
}
