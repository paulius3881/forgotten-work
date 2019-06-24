<?php

namespace App\Controller;
use App\Entity\RoadSection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RoadsController extends AbstractController
{
    /**
     * @Route("/roads", name="roads")
     */
    public function index()
    {
        $roads = $this->getDoctrine()->getRepository(RoadSection::class)->findAll();
        return $this->render('roads/index.html.twig', [
            'controller_name' => 'RoadsController',
            'roads' => $roads,
        ]);

    }
}
