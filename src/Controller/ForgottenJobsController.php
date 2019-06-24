<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\RoadSection;

class ForgottenJobsController extends AbstractController
{
    /**
     * @Route("/forgottenjobs", name="forgotten_jobs")
     */
    public function index()
    {
       // $date=date('Y-m-d', strtotime('-380 days'));//isveda darbus kurie nepriziureti per 380 dienu skirta patikrinimui
        $date=date('Y-m-d', strtotime('-30 days'));

        $em = $this->getDoctrine()->getManager();
        $RAW_QUERY = 'SELECT done_jobs.id, job.job_id, road_section.section_id, done_jobs.job_name, done_jobs.road_section,
         done_jobs.road_section_begin,done_jobs.road_section_end, done_jobs.unit_of, done_jobs.quantity, done_jobs.done_job_date,
          done_jobs.note, done_jobs.road_level FROM done_jobs INNER JOIN job ON job.id=done_jobs.job_id_id LEFT JOIN road_section ON
           road_section.id=done_jobs.section_id_id WHERE (done_jobs.unit_of LIKE \'%km%\' OR done_jobs.unit_of LIKE \'%m\' OR done_jobs.unit_of
            LIKE \'%km\' OR done_jobs.unit_of LIKE \'m%\' OR done_jobs.unit_of LIKE \'km%\') AND done_jobs.done_job_date <= :date ';
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute(['date'=>$date]);

        $forgottenjobs = $statement->fetchAll();

        $em1 = $this->getDoctrine()->getManager();
        $RAW_QUERY1 = "SELECT road_section.section_id, road_section.section_begin, road_section.section_end FROM road_section";
        $statement1 = $em1->getConnection()->prepare($RAW_QUERY1);
        $statement1->execute();

        $roads = $statement1->fetchAll();

        $range = array();

        foreach($forgottenjobs as $frgjob)
        {
            $range[$frgjob['id']]=$frgjob['road_section_end']-$frgjob['road_section_begin'];
        }
        $left=array();

        foreach ($forgottenjobs as $frgjob)
        {
         if($frgjob['section_id']!=null)
         {

            foreach ($roads as $road)
            {
                if($road['section_id']==$frgjob['section_id']){
                    $left[$frgjob['id']]=$road['section_end']-$road['section_begin']-$range[$frgjob['id']];
                    if($left[$frgjob['id']]<0){
                        $left[$frgjob['id']]=0;
                    }
                }
            }
         }
         else
             {
             $left[$frgjob['id']]=0;
             }
        }

        return $this->render('forgotten_jobs/index.html.twig', [
            'controller_name' => 'ForgottenJobsController',
            'donejobs'=> $forgottenjobs,
            'date'=>$date,
            'range'=>$range,
            'left'=>$left,
        ]);
    }
}
