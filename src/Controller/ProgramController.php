<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/program", name="program_")
 */
class ProgramController extends AbstractController
{
    /**
    * Affiche tous les programmes
    * @Route("/", name="index")
    */
    public function index(): Response
    {
        return $this->render('program/index.html.twig', [
            'website' => 'Wild Series',
        ]);
    }


    /**
    * Affiche un programme en détail
    * @Route("/{id}", name="show", 
    * requirements={"id"="\d+"},
    * methods={"GET"})
    */

    public function show(int $id)
    {
        return $this->render('program/show.html.twig',[
            'id' => $id
        ]);
    }

}
