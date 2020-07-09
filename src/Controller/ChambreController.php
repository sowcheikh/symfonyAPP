<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ChambreType;
use App\Repository\ChambreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChambreController extends AbstractController
{
    /**
     * @Route("/chambre", name="chambre")
     */
    public function index(ChambreRepository $chambreRepository)
    {
        $chambres = $chambreRepository->findAll();
        // dd($chambres);
        return $this->render('chambre/index.html.twig', [
            'chambres' => $chambres,
        ]);
    }

     /**
     * @Route("chambre/create", name="chambre_create", methods={"POST", "GET"})
     */
    public function create(Request $request, EntityManagerInterface $em, FlashyNotifier $flashy):Response
    {
        $chambre = new Chambre();
        $form = $this->createForm(ChambreType::class,$chambre);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            // dd($chambre);
            // $em= $this->getDoctrine()->getManager();
            $em->persist($chambre);
            $em->flush();
            $flashy->primaryDark('Chambre enregistrer!', 'http://your-awesome-link.com');
            return $this->redirectToRoute('chambre');
        }
        // dump($chambre);
        return $this->render('chambre/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("chambre/{id<[0-9]+>}/update", name="chambre_update", methods={"POST", "GET"})
     */
    public function update(Request $request, EntityManagerInterface $em, Chambre $chambre, FlashyNotifier $flashy):Response
    {
        $form = $this->createForm(ChambreType::class,$chambre);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            $em->flush();
            $flashy->success('Chambre modifier!', 'http://your-awesome-link.com');
            return $this->redirectToRoute('chambre');
        }
        // dump($chambre);
        return $this->render('chambre/create.html.twig', [
            'chambre' => $chambre,
            'form' => $form->createView(),
        ]);
    }

        /**
     * @Route("chambre/{id<[0-9]+>}/delete", name="chambre_delete")
     */
    public function delete(EntityManagerInterface $em, Chambre $chambre)
    {
        $em->remove($chambre);
        $em->flush();
        return $this->redirectToRoute('chambre');
    }
}
