<?php
/**
 * Created by PhpStorm.
 * User: UHP Digital
 * Date: 12/10/2019
 * Time: 11:22 AM
 */

namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Proxies\__CG__\App\Entity\BDatabase;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/database")
 * Class BDatabaseController
 * @package App\Controller
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



}