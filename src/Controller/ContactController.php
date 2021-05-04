<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this -> createForm(ContactFormType::class, []);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        { 
            // dd($form->getData());
            $from = $form->getData()['fullname'];
            $email = $form->getData()['email'];
            $message = $form->getData()['message'];

            $email = (new Email())
                ->from($email)
                ->to('you@exemple.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Message de '. $from)
                ->text($message)
                ->html($message);

                $mailer->send($email);

                $this->addFlash('success', 'Votre mail a bien été envoyé ! ');
                return $this->redirectToRoute('contact');

        }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/email", name="email_test")
     */
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('me@example.com')
            ->to('you@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Test mail avec les dev 2021')
            ->text('Sending emails is fun again!')
            ->html('<p>Voir ensuite contact form</p>');

        $mailer->send($email);

        return new Response("Email envoyé");

        
    }
}
