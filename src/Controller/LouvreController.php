<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Booking;

class LouvreController extends AbstractController
{
    /**
     * @Route("/louvre", name="louvre")
     */
    public function index()
    {
        return $this->render('louvre/index.html.twig', [
            'controller_name' => 'LouvreController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('louvre/home.html.twig');
    }

    /**
     * @Route("/booking", name="booking")
     */
    public function booking(Request $request, ObjectManager $manager)
    {
        $booking = new Booking();

        $form = $this->createFormBuilder($booking)
            ->add('email')
            ->add('visitdate')
            ->add('bookingnumber')
            ->add('totalprice')
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            // Ici, il est peut-être possible de créer le numero de résa (40')
            $manager->persist($booking);
            $manager->flush();

            return $this->redirectToRoute('home');
            // quand elle sera créée il faudra rediriger vers la route "payment"
        }
            

        return $this->render('louvre/booking.html.twig', ['formBooking' => $form->createView()]);
    }

    /**
     * @Route("/infos", name="infos")
     */
    public function infos()
    {
        return $this->render('louvre/infos.html.twig');
    }
}
