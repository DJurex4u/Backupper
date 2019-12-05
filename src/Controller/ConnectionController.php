<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 12/5/2019
 * Time: 12:34 PM
 */

namespace App\Controller;


use App\Entity\Connection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Project;

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

}