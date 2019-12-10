<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 12/10/2019
 * Time: 2:42 PM
 */

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class BData
 * @package App\Controller
 * @Route("/data")
 */
class BData extends AbstractController
{
    /**
     * @Route("/delete/{id}", name="bData_delete", methods={"GET", "DELETE"})
     * @param Request $request
     * @param int $id
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

}