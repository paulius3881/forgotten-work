<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 2019-06-23
 * Time: 20:45
 */

namespace App\DataFixtures;

use App\Entity\DoneJobs;
use App\Entity\Job;
use App\Entity\RoadSection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DoneJobsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $csv = fopen("done_jobs.csv", "r");

        while (!feof($csv)) {
            $lines = fgetcsv($csv);

            $line=explode(";",$lines[0]);

            $jobbyid = $manager->getRepository(Job::class)->findOneBy(['job_id' => $line[1]]);
            $roadid = $manager->getRepository(RoadSection::class)->findOneBy(['section_id' => $line[10]]);

            $donejobs=new DoneJobs();


            $donejobs->setJobId($jobbyid);
            $donejobs->setJobName($line[2]);
            $donejobs->setRoadSection($line[3]);
            $donejobs->setRoadSectionBegin($line[4]);
            $donejobs->setRoadSectionEnd($line[5]);
            $donejobs->setUnitOf($line[6]);
            $donejobs->setQuantity(floatval($line[7]));
            $donejobs->setDoneJobDate(\DateTime::createFromFormat('Y-m-d H:i', $line[8]));
            $donejobs->setNote($line[9]);
            $donejobs->setSectionId($roadid);
            $donejobs->setRoadLevel($line[11]);

            $manager->persist($donejobs);
            $manager->flush();

        }
        fclose($csv);
    }
    public function getDependencies()
    {
        return array(
            JobsFixtures::class,
            RoadsFixtures::class
        );
    }
}
