<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function index(EtudiantRepository $etudiantRepository)
    {
        $etudiants = $etudiantRepository->findAll();
        return $this->render('etudiant/index.html.twig', compact(('etudiants')));
    }

         /**
     * @Route("etudiant/create", name="etudiant_create", methods={"POST", "GET"})
     */
    public function create(Request $request, EntityManagerInterface $em):Response
    {
        $etudiant = new Etudiant();
        $form = $this->createFormBuilder($etudiant)
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'row_attr' => [
                'class' => 'myclass'
            ],
            'attr'=> ['placeholder' => 'Entrer le nom']
        ])
        ->add('prenom',  TextType::class, [
            'label' => 'Prénom',
            'row_attr' => [
                'class' => 'myclass'
            ],
            'attr'=> ['placeholder' => 'Entrer le prénom']
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'row_attr' => [
                'class' => 'myclass'
            ],
            'attr'=> ['placeholder' => 'Entrer email']
        ])
        ->add('telephone', TelType::class, [
            'label' => 'Téléphone',
            'row_attr' => [
                'class' => 'myclass'
            ],
            'attr'=> ['placeholder' => 'Exp: 770000000']
        ])
        ->add('datenaissance', BirthdayType::class,
        [
            'label' => 'Date inscription',
            'required' => true,
            'row_attr' => [
                'class' => 'myclass'
            ],
        ])
        ->add('boursier', CheckboxType::class,
            [
                'label' => 'Etudiant boursier',
                'row_attr' => [
                    'id'=> 'bourse'
                ],
                'required'=> false])
        ->add('loger', ChoiceType::class,[
            'label' => 'Etdiant loger',
            'row_attr' => [
                'class' => 'myclass', 'id'=> 'type_etudiant'
            ],
            'choices' => [
                'Loger' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ]
            ],
        ])
        ->add('adresse', TextType::class, [
            'label' => 'Adresse',
            'row_attr' => [
                'class' => 'myclass'
            ],
            'required'=>false,
            'attr'=> ['placeholder' => 'Adresse']
        ])
        ->add('dateajout', BirthdayType::class,
        [
            'label' => 'Date inscription',
            'required' => true,
            'row_attr' => [
                'class' => 'myclass'
            ],
        ])
        ->add('occuper', EntityType::class,
        [
            'label' => 'Numéro chambre occupé',
            'class' => Chambre::class,
            'choice_label' => 'numch',
        ])
        ->add('matricule', TextType::class, [
            'label' => 'Matricule',
            'attr'=> ['placeholder' => 'Entrer le matricule']
        ])
        ->getForm()
        ;
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            // dd($etudiant);
            // $em= $this->getDoctrine()->getManager();
            
            $em->persist($etudiant);
            $em->flush();
            return $this->redirectToRoute('etudiant');
        }
        return $this->render('etudiant/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

        /**
     * @Route("etudiant/{id<[0-9]+>}/update", name="etudiant_update", methods={"POST", "GET"})
     */
    public function update(Request $request, EntityManagerInterface $em, Etudiant $etudiant):Response
    {
        $form = $this->createForm(EtudiantType::class,$etudiant);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            $em->flush();
            return $this->redirectToRoute('etudiant');
        }
        // dump($etudiant);
        return $this->render('etudiant/create.html.twig', [
            'etudiant' => $etudiant,
            'form' => $form->createView(),
        ]);
    }

        /**
     * @Route("etudiant/{id<[0-9]+>}/delete", name="etudiant_delete")
     */
    public function delete(EntityManagerInterface $em, Etudiant $etudiant)
    {
        $em->remove($etudiant);
        $em->flush();
        return $this->redirectToRoute('etudiant');
    }
}
