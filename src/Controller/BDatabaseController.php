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

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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
    /**
     * @Route("/delete/{id}", name="bDatabase_delete")
     * @Method({"DELETE"})
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

        return $this->redirect($request->headers->get('referer'));
    }


    /**
     * @Route("/create/{id}", name="bDatabase_create")
     * @Method({"GET","POST"})
     * @param Request $request
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
            ->add('serverName', TextType::class)
            ->add('userName', TextType::class)
            ->add('password', PasswordType::class)
            ->add('driver', TextType::class)
            ->add('port', IntegerType::class)
            ->add('dbSchema', TextType::class)

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
            return $this->redirect($request->headers->get('referer'));
        }

        return $this->render('bDatabase/create.html.twig', ['form' => $form->createView()]);

    }




}