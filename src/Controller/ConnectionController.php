<?php

namespace App\Controller;

use App\Entity\BDatabase;
use App\Entity\Connection;
use App\Entity\Project;
use App\Service\SSHConnector;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



/**
 * Class ConnectionController
 * @package App\Controller
 * @Route("/connection")
 */
class ConnectionController extends AbstractController
{
    /**
     * @Route("/delete/{id}", name="connection_delete", methods={"POST"})
     * @param Request $request
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function deleteAction(Request $request, int $id)
    {
        $connection = $this->getDoctrine()->getRepository(Connection::class)->find($id);

        if (!$connection) {
            throw $this->createNotFoundException(
                'No connection found for id ' . $id
            );
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($connection);
        $entityManager->flush();
        $this->addFlash('success', 'Action successfully completed!');

        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * @Route("/create/{id}", name="connection_create", methods={"GET","POST"})
     * @param Request $request
     * @param ValidatorInterface $validator
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request, ValidatorInterface $validator, int $id)
    {
        $connection = new Connection();


        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);

        if (!$project) {
            throw $this->createNotFoundException(
                'No project found for id ' . $id
            );
        }

        $connection->setProject($project);

        $form = $this->createFormBuilder($connection)
            ->add('username', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('dbHostName', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('port', IntegerType::class, ['attr' => ['class' => 'ml-4']])
            ->add('password', PasswordType::class, ['attr' => ['class' => 'ml-4']])
            ->add('save', SubmitType::class, [
                'label' => 'Create',
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]
            ])
            ->getForm();




        $form->handleRequest($request);


        $errors = $validator->validate($connection);


        if ($form->isSubmitted() && $form->isValid() && (count($errors) == 0)) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($connection);
            $entityManager->flush();
            $this->addFlash('success', 'Action successfully completed!');

            return $this->redirectToRoute('project_read', ['id' => $project->getId()]);
        }

        return $this->render('connection/create.html.twig', ['form' => $form->createView(), 'projectId' => $id]);
    }

    /**
     * @Route("/update/{id}", name="connection_update", methods={"GET","POST"})
     * @param Request $request
     * @param int $id
     * @param ValidatorInterface $validator
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function updateAction(Request $request, int $id, ValidatorInterface $validator)
    {
        $connection = $this->getDoctrine()->getRepository(Connection::class)->find($id);
        $projectId = $connection->getProject()->getId();


        if (!$connection) {
            throw new \Exception('Cannon find connection for id' . $id);
        }

        $form = $this->createFormBuilder($connection)
            ->add('username', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('dbHostName', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('port', IntegerType::class, ['attr' => ['class' => 'ml-4']])
            ->add('password', PasswordType::class, ['attr' => ['class' => 'ml-4']])// Password is stored in plain text !!


            ->add('save', SubmitType::class, [
                'label' => 'Save',
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);
        $errors = $validator->validate($connection);

        if ($form->isSubmitted() && $form->isValid() && (count($errors) == 0)) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($connection);
            $entityManager->flush();
            $this->addFlash('success', 'Action successfully completed!');

            return $this->redirectToRoute('project_read', ['id' => $projectId]);
        }

        return $this->render('connection/update.html.twig', ['form' => $form->createView(), 'projectId' => $projectId]);
    }

    /**
     * @Route("/test", name="connection_test")
     * @param Request $request
     */
    public function testAction(Request $request)
    {
        //TODO: hardcoded id
        $connection = $this->getDoctrine()->getRepository(Connection::class)->find(35);
        $database = $this->getDoctrine()->getRepository(BDatabase::class)->find(18);

        $sshConnector = new SSHConnector($connection);
        $sshConnector->connectSSH();

        $sshConnector->backupDatabaseOnRemote($database);

        $sshConnector->copyFilesFromRemote();



        die("<br> kraj testAction </br>");
    }
}