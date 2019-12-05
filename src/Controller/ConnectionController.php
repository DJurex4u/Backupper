<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 12/5/2019
 * Time: 12:34 PM
 */

namespace App\Controller;


use App\Entity\Connection;
use App\Entity\Project;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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
     * @Route("/delete/{id}", name="connection_delete")
     * @Method({"DELETE"})
     * @param Request $request
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function readAction(Request $request, int $id)
    {
        $connection = $this->getDoctrine()->getRepository(Connection::class)->find($id);


        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($connection);
        $entityManager->flush();

        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * @Route("/create/{id}", name="connection_create")
     * @Method({"GET","POST"})
     * @param Request $request
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
            ->add('username', TextType::class)
            ->add('dbHostName', TextType::class)
            ->add('port', IntegerType::class)
            ->add('password', PasswordType::class)   // Password is stored in plain text !!


            ->add('save', SubmitType::class, [
                'label' => 'Create',
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]

            ])
            ->getForm();

        $errors = $validator->validate($connection);                // read the comment below...
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {             //"&& (count($errors) == 0" was removed cause it seems to work fine without it, and it DEFINETLY does NOT work with it)
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($connection);
            $entityManager->flush();
            return $this->redirect($request->headers->get('referer'));
        }

        return $this->render('project/create.html.twig', ['form' => $form->createView()]);
    }

}