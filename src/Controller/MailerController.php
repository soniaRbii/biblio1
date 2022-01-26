<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
class MailerController extends AbstractController
{
    /**
     * @Route("/mail", name="mail")
     */
    public function sendEmail(MailerInterface $mailer, Request $request)
    {
     
        $emailForm = $this->createFormBuilder()
            ->add('message', TextareaType::class, [
                'attr' => array('rows' => '5')
            ])
            ->add('Envoyer', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-outline-danger float-right'
                ]
            ])

            ->getForm();

        $emailForm->handleRequest($request);


        if ($emailForm->isSubmitted()) {
            $saisir = $emailForm->getData();
            $text = ($saisir['message']);
            $username =$request->getSession()->get(Security::LAST_USERNAME );
            $email = (new TemplatedEmail())
                ->from('soniarbii878@gmail.com')
                ->to('meriem.hamdeni@enis.tn')
                ->subject('Livres')

                ->htmlTemplate('mailer/mail.html.twig')

                ->context([
                    'username' => $username,
                    'text' => $text
                ]);

            $mailer->send($email);
            $this->addFlash('Livres', 'Le message a été envoyé!');
            return $this->redirect($this->generateUrl('mail'));
        }

        return $this->render('mailer/index.html.twig', [
            'emailForm' => $emailForm->createView()
        ]);
    }
}
