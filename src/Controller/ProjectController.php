<?php

namespace App\Controller;


use App\Entity\Project;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;


/**
 * Class ProjectController
 * @package App\Controller
 * @Route("/project")
 */
class ProjectController extends AbstractController
{
    const DEFAULT_KEEP_AMOUNT = 3;

    /**
     * @Route("/list", name="project_list", methods={"GET"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $projects = $this->getDoctrine()->getRepository(Project::class)->findAll();

        return $this->render('project/list.html.twig', array('projects' => $projects));
    }

    /**
     * @Route("/read/{id}", name="project_read", methods={"GET"})
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
                'No project found for id ' . $id
            );
        }

        return $this->render('project/read.html.twig', array('project' => $project));
    }

    /**
     * @Route("/update/{id}", name="project_update", methods={"GET","POST"})
     * @param Request $request
     * @param int $id
     * @param ValidatorInterface $validator
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function updateAction(Request $request, int $id, ValidatorInterface $validator)
    {
        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);

        if (!$project) {
            throw new \Exception('Cannot find project for id' . $id);
        }


        $form = $this->createFormBuilder($project)
            ->add('name', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('personInCharge', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('keepAmount', IntegerType::class, ['attr' => ['class' => 'ml-4']])
            ->add('save', SubmitType::class, ['label' => 'Save',
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]])
            ->getForm();


        $form->handleRequest($request);
        $errors = $validator->validate($project);

        if ($form->isSubmitted() && $form->isValid() && (count($errors) == 0)) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();
            $this->addFlash('success', 'Action successfully completed!');

            return $this->redirectToRoute('project_read', ['id' => $project->getId()]);
        }

        return $this->render('project/update.html.twig', ['form' => $form->createView(), 'projectId' => $project->getId()]);
    }

    /**
     * @Route("/delete/{id}", name="project_delete", methods={"GET", "DELETE"})
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
        $this->addFlash('success', 'Action successfully completed!');

        //$response = new Response();
        //$response->send();
        return $this->redirectToRoute('project_list');
    }

    /**
     * @Route("/create", name="project_create", methods={"GET","POST"})
     * @param Request $request
     * @param ValidatorInterface $validator
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request, ValidatorInterface $validator)
    {
        $project = new Project();
        $form = $this->createFormBuilder($project)
            ->add('name', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('personInCharge', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('keepAmount', IntegerType::class, ['attr' => ['class' => 'ml-4']])
            ->add('save', SubmitType::class, [
                'label' => 'Create',
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]
            ])
            ->getForm();


        $form->handleRequest($request);
        $errors = $validator->validate($project);


        if ($form->isSubmitted() && $form->isValid() && (count($errors) == 0)) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();
            $this->addFlash('success', 'Action successfully completed!');
            return $this->redirectToRoute('project_read', ['id' => $project->getId()]);
        }

        return $this->render('project/create.html.twig', ['form' => $form->createView()]);
    }

}