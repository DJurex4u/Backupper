<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 12/10/2019
 * Time: 11:22 AM
 */

namespace App\Controller;

use App\Entity\Project;
use App\Entity\BDatabase;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class BDatabaseController
 * @package App\Controller
 * @Route("/database")
 */
class BDatabaseController extends AbstractController
{
    // TODO Needs to be refactored :(
    const  DB_DRIVER_LIST = [
        'none' => 'none',
        'ODBC' => 'ODBC'
    ];

    const DB_SCHEMA_LIST = [
        'none' => 'none',
        'ANSI' => 'ANSI',
        'DB2' => 'DB2',
        'MAXDB' => 'MAXDB',
        'MYSQL323' => 'MYSQL323',
        'MYSQL40' => 'MYSQL40',
        'MSSQL' => 'MSSQL',
        'ORACLE' => 'ORACLE',
        'TRADITIONAL' => 'TRADITIONAL'
    ];


    /**
     * @Route("/delete/{id}", name="bDatabase_delete", methods={"GET","DELETE"})
     * @param Request $request
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, int $id)
    {
        $bDatabase = $this->getDoctrine()->getRepository(BDatabase::class)->find($id);

        if (!$bDatabase) {
            throw $this->createNotFoundException(
                'No database found for id ' . $id
            );
        }
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($bDatabase);
        $entityManager->flush();
        $this->addFlash('success', 'Action successfully completed!');

        return $this->redirect($request->headers->get('referer'));
    }


    /**
     * @Route("/create/{id}", name="bDatabase_create", methods={"GET","POST"})
     * @param Request $request
     * @param ValidatorInterface $validator
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request, ValidatorInterface $validator, int $id)
    {
        $bDatabase = new BDatabase();
        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);

        if (!$project) {
            throw $this->createNotFoundException(
                'No project found for id ' . $id
            );
        }
        $bDatabase->setProject($project);

        $form = $this->createFormBuilder($bDatabase)
            ->add('serverName', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('userName', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('password', PasswordType::class, ['attr' => ['class' => 'ml-4']])
            ->add('driver', ChoiceType::class, ['attr' => ['class' => 'ml-4'], 'choices' => self::DB_DRIVER_LIST])
            ->add('port', IntegerType::class, ['attr' => ['class' => 'ml-4']])
            ->add('dbSchema', ChoiceType::class, ['attr' => ['class' => 'ml-4'], 'choices' => self::DB_SCHEMA_LIST])
            //TODO: periodType = NULL

            ->add('save', SubmitType::class, [
                'label' => 'Create',
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);
        $errors = $validator->validate($bDatabase);

        if ($form->isSubmitted() && $form->isValid() && (count($errors) == 0)) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bDatabase);
            $entityManager->flush();
            $this->addFlash('success', 'Action successfully completed!');

            return $this->redirectToRoute('project_read', ['id' => $project->getId()]);
        }

        return $this->render('bDatabase/create.html.twig', ['form' => $form->createView(), 'projectId' => $id]);

    }

    /**
     * @Route("/update/{id}", name="bDatabase_update", methods={"GET","POST"})
     * @param Request $request
     * @param int $id
     * @param ValidatorInterface $validator
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function updateAction(Request $request, int $id, ValidatorInterface $validator)
    {
        $bDatabase = $this->getDoctrine()->getRepository(BDatabase::class)->find($id);
        /** @var int $projectId */
        $projectId = $bDatabase->getProject()->getId();

        if (!$bDatabase) {
            throw new \Exception('Cannon find database for id' . $id);
        }

        $form = $this->createFormBuilder($bDatabase)
            ->add('serverName', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('userName', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('password', PasswordType::class, ['attr' => ['class' => 'ml-4']])
            ->add('driver', ChoiceType::class, ['attr' => ['class' => 'ml-4'], 'choices' => self::DB_DRIVER_LIST])
            ->add('port', IntegerType::class, ['attr' => ['class' => 'ml-4']])
            ->add('dbSchema', ChoiceType::class, ['attr' => ['class' => 'ml-4'], 'choices' => self::DB_SCHEMA_LIST])
            //TODO: periodType = NULL

            ->add('save', SubmitType::class, [
                'label' => 'Save',
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);
        $errors = $validator->validate($bDatabase);

        if ($form->isSubmitted() && $form->isValid() && (count($errors) == 0)) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bDatabase);
            $entityManager->flush();
            $this->addFlash('success', 'Action successfully completed!');

            return $this->redirectToRoute('project_read', ['id' => $projectId]);
        }

        return $this->render('bDatabase/update.html.twig', ['form' => $form->createView(), 'projectId' => $projectId]);

    }

}