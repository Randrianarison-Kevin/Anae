<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(MailerInterface $mailer, HttpFoundationRequest $request, EntityManagerInterface $manager): Response
    {   
        $contact = new Contact();
        $form= $this->createForm(ContactType::class, $contact);
        $form ->handleRequest($request);
        
        if ($form->isSubmitted() && $form ->isValid()) {
            $contact = $form ->getData();
            $manager ->persist($contact);
            $manager->flush();

            $email = (new Email())
            ->from($contact-> getContactEmail())
            ->to('admin@example.com')
            ->subject($contact->getContactSujet())
            ->text($contact->getContactMessage());

        $mailer->send($email);
        }
        return $this->render('contact/contact.html.twig', [
            'form' => $form
        ]);
    }
}
