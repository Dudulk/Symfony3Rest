<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Secteur;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rest/secteurs")
 */
class SecteurController extends AbstractFOSRestController
{

    /**
     * @Rest\View()
     * @Rest\Get("/")
     */
    public function getSecteursAction()
    {
        return $this->getDoctrine()->getRepository('AppBundle:Secteur')->findAll();
    }

    /**
     * @Rest\View()
     * @Rest\Get("/{id}")
     */
    public function getSecteurAction(Secteur $secteur)
    {
        return $secteur;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/{id}/structures")
     */
    public function getSecteurStructuresAction(Secteur $secteur)
    {
        return $secteur->getStructures();
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Post("/rest/secteurs")
     */
    public function postSecteurAction(Request $request)
    {
        $secteur = new Secteur();
        $secteur->setLibelle($request->get('libelle'));

        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($secteur);
        $em->flush();

        return $secteur;
    }
}