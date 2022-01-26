<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function reg(Request $request, UserPasswordEncoderInterface $passEncoder, ValidatorInterface $validator)
    {  
        $regform = $this->createFormBuilder()
            ->add('username', TextType::class, [
                'label' => 'Username'
                
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'first_options' => ['label' => 'password'],
                'second_options' => ['label' => 'repeat Password']
            ])

            ->add('register', SubmitType::class)
            ->getForm();

        $regform->handleRequest($request);

        if ($regform->isSubmitted()) {
            $saisie = $regform->getData();

            $user = new User();
            $user->setUsername($saisie['username']);

            $user->setPassword(
                $passEncoder->encodePassword($user, $saisie['password'])
            );
           

            $errors = $validator->validate($user);
            if (count($errors) > 0) {
                return $this->render('register/index.html.twig', [
                    'regform' => $regform->createView(),
                    'errors' => $errors
                ]);
            } else {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('home'));
        }


        return $this->render('register/index.html.twig', [
            'regform' => $regform->createView(),
            'errors' => null
        ]);
    }
}
