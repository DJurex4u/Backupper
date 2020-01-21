<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 12/10/2019
 * Time: 3:34 PM
 */

namespace App\Controller;

use App\Entity\BData;
use App\Entity\Project;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class BDataController
 * @package App\Controller
 * @Route("/bdata")
 */
class BDataController extends AbstractController
{
    /**
     * @Route("/delete/{id}", name="bData_delete", methods={"POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function deleteAction(Request $request, int $id)
    {
        $data = $this->getDoctrine()->getRepository(BData::class)->find($id);

        if (!$data) {
            throw $this->createNotFoundException(
                'No connection found for id ' . $id
            );
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($data);
        $entityManager->flush();
        $this->addFlash('success', 'Action successfully completed!');

        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * @Route("/create/{id}", name="bData_create", methods={"GET","POST"})
     * @param Request $request
     * @param int $id
     * @param ValidatorInterface $validator
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request, int $id, ValidatorInterface $validator)
    {
        $bData = new BData();
        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);

        if (!$project) {
            throw $this->createNotFoundException(
                'No project found for id ' . $id
            );
        }
        $bData->setProject($project);

        $form = $this->createFormBuilder($bData)
            ->add('sourceDirectory', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('destinationDirectory', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('save', SubmitType::class, [
                'label' => 'Create',
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);
        $errors = $validator->validate($bData);

        if ($form->isSubmitted() && $form->isValid() && (count($errors) == 0)) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bData);
            $entityManager->flush();
            $this->addFlash('success', 'Action successfully completed!');

            return $this->redirectToRoute('project_read', ['id' => $project->getId()]);
        }

        return $this->render('bData/create.html.twig', ['form' => $form->createView(), 'projectId' => $id]);

    }

    /**
     * @Route("/update/{id}", name="bData_update", methods={"GET","POST"})
     * @param Request $request
     * @param int $id
     * @param ValidatorInterface $validator
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function updateAction(Request $request, int $id, ValidatorInterface $validator)
    {
        $bData = $this->getDoctrine()->getRepository(BData::class)->find($id);
        $projectId = $bData->getProject()->getId();

        if (!$bData) {
            throw new \Exception('Cannon find data for id' . $id);
        }

        $form = $this->createFormBuilder($bData)
            ->add('sourceDirectory', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('destinationDirectory', TextType::class, ['attr' => ['class' => 'ml-4']])
            ->add('save', SubmitType::class, [
                'label' => 'Save',
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);
        $errors = $validator->validate($bData);

        if ($form->isSubmitted() && $form->isValid() && (count($errors) == 0)) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bData);
            $entityManager->flush();
            $this->addFlash('success', 'Action successfully completed!');

            return $this->redirectToRoute('project_read', ['id' => $projectId]);
        }

        return $this->render('bData/update.html.twig', ['form' => $form->createView(), 'projectId' => $projectId]);

    }


}