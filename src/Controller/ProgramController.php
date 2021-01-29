<?php

namespace App\Controller;

use App\Entity\Program;
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
    * @return Response A response instance
    */
    public function index(): Response
    {
        $programs = $this->getDoctrine()
        ->getRepository(Program::class)
        ->findAll();
        return $this->render('program/index.html.twig', [
            'programs' => $programs,
        ]);
    }


    /**
    * Affiche un programme en détail grâce à son id
    * @Route("/{id<^[0-9]+$>}", name="show", 
    * methods={"GET"})
    * @return Response
    */

    public function show(int $id):Response
    {
        $program = $this->getDoctrine()
        ->getRepository(Program::class)
        ->findOneBy(['id'=> $id]);

        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$id.' found in program\'s table.'
            );
        }

        return $this->render('program/show.html.twig',[
            'program' => $program,
        ]);
    }

}
