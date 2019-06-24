<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 2019-06-23
 * Time: 20:30
 */

namespace App\DataFixtures;


use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class JobsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $csv = fopen("job.csv", "r");

        while (!feof($csv)) {
            $lines = fgetcsv($csv);

            $line=explode(";",$lines[0]);

            $job=new Job();

            $job->setJobId($line[1]);
            $job->setJobName($line[2]);
            $job->setJobQuantity($line[3]);

            $manager->persist($job);
            $manager->flush();
        }
        fclose($csv);
    }
}
