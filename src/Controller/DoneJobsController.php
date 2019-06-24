<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\DoneJobs;
use App\Entity\Job;
use App\Entity\RoadSection;

class DoneJobsController extends AbstractController
{
    /**
     * @Route("/donejobs", name="done_jobs")
     */
    public function index()
    {
        $donejobs = $this->getDoctrine()->getRepository(DoneJobs::class)->findAll();
        $jobs = $this->getDoctrine()->getRepository(Job::class)->findAll();
        $roads = $this->getDoctrine()->getRepository(RoadSection::class)->findAll();
        return $this->render('done_jobs/index.html.twig', [
            'controller_name' => 'DoneJobsController',
            'donejobs' => $donejobs,

        ]);
    }
}
