<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\DoneJobs;


class DoneJobsController extends AbstractController
{
    /**
     * @Route("/donejobs", name="done_jobs")
     */
    public function index()
    {
        $donejobs = $this->getDoctrine()->getRepository(DoneJobs::class)->findAll();
        return $this->render('done_jobs/index.html.twig', [
            'controller_name' => 'DoneJobsController',
            'donejobs' => $donejobs,

        ]);
    }
}
