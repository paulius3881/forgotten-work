<?php

namespace App\DataFixtures;

use App\Entity\RoadSection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $csv = fopen("road_section.csv", "r");

        while (!feof($csv)) {
            $lines = fgetcsv($csv);

            $line=explode(";",$lines[0]);

            var_dump($line[1]);

            $road=new RoadSection();

            $road->setSectionId($line[1]);
            $road->setSectionName($line[2]);
            $road->setUnitId($line[3]);
            $road->setSectionBegin($line[4]);
            $road->setSectionEnd($line[5]);
            $road->setLevel($line[6]);

            $manager->persist($road);
            $manager->flush();

        }
        fclose($csv);


    }
}
