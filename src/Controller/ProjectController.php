<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 11/28/2019
 * Time: 9:40 AM
 */

namespace App\Controller;


use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project/read, name="project_list")
     */
    public function listAction(){
        $project = $this->getDoctrine()->getRepository(Project::class)->findAll;
        return $this->render('project/read.html.twig', array('project => $project'));
    }

    /**
     * @Route("/project/read/{id}, name="project_read")
    */
    public function readAction($id){
        $projects = $this->getDoctrine()->getRepository(Project::class)->find($id);
        //return $this->
    }

}