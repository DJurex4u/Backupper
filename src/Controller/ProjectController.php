<?php

namespace App\Controller;


use App\Entity\Project;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ProjectController extends AbstractController
{
    /**
     * @Route("/project/list", name="project_list")
     * @Method({"GET"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $projects = $this->getDoctrine()->getRepository(Project::class)->findAll();

        return $this->render('project/list.html.twig', array('projects' => $projects));
    }

    /**
     * @Route("/project/read/{id}", name="project_read")
     * @Method({"GET"})
     * @param Request $request
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function readAction(Request $request, int $id)
    {
        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);

        if (!$project) {
            throw $this->createNotFoundException(
                'No project found for id '.$id
            );
        }

        return $this->render('project/read.html.twig', array('project' => $project));

    }

    /**
     * @Route("/project/update/{id}", name="project_update")
     * Method({"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function updateAction(Request $request,int $id)
    {
        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);

        if (!$project) {
            throw new \Exception('Cannot find project for id' .$id);
        }

        $form = $this->createFormBuilder($project)
            ->add('name', TextType::class)
            ->add('personInCharge', TextType::class)
            ->add('keepAmount', IntegerType::class)
            ->add('save', SubmitType::class, ['label' => 'Save',
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();

            return $this->redirectToRoute('project_list');
        }

        return $this->render('project/update.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/project/delete/{id}", name="project_delete")
     * @Method({"DELETE"})
     * @param Request $request
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, int $id)
    {
        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($project);
        $entityManager->flush();


        //$response = new Response();
        //$response->send();

        return $this->redirectToRoute('project_list');
    }

    /**
     * @Route("/project/create", name="project_create")
     * @Method({"GET","POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $project = new Project();
        $form = $this->createFormBuilder($project)
            ->add('name', TextType::class)
            ->add('personInCharge', TextType::class)
            ->add('keepAmount', IntegerType::class)


            ->add('save', SubmitType::class, [
                'label' => 'Create',
                    'attr' => [
                        'class' => 'btn btn-primary mt-3'
                            ]

            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();
            return $this->redirectToRoute('project_list');
        }

        return $this->render('project/create.html.twig',['form' => $form->createView()]);
    }

}