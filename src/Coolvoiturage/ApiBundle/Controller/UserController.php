<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 02/12/2017
 * Time: 15:11
 */

namespace Coolvoiturage\ApiBundle\Controller;

use Coolvoiturage\ApiBundle\Entity\Circle;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Coolvoiturage\ApiBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class UserController extends Controller
{
    public function getloginUserAction($email)
    {
        $user = $this->getDoctrine()->getManager()->getRepository('CoolvoiturageApiBundle:User')->findOneBy(array("emailCanonical" => $email));
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($user);
        return new JsonResponse($formatted);


    }


    public function newUserAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setNom($request->get('firstname'));
        $user->setPrenom($request->get('lastname'));
        $user->setEmail($request->get('mail'));
        $user->setEmailCanonical($request->get('mail'));
        $user->setUsername($request->get('username'));
        $user->setUsernameCanonical($request->get('username'));
        $user->setEnabled(true);
        $user->setTelephone($request->get('phone'));
        $user->setPassword($request->get('password'));
        $user->setSexe($request->get('sexe'));
        $user->setAvatar("carpoolog2.png");
        $user->setRoles(array($request->get('role')));
        $circle = $this->getDoctrine()->getManager()->getRepository('CoolvoiturageApiBundle:Circle')->find(1);
        $user->setCircle($circle);
        $date = new DateTime($request->get('birthdate'));
        $user->setDateNaissance($date);


        $em->persist($user);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($user);
        return new JsonResponse($formatted);
    }

    public function allAction()
    {
        $tasks = $this->getDoctrine()->getManager()
            ->getRepository('CoolvoiturageApiBundle:User')
            ->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tasks);
        return new JsonResponse($formatted);
    }

    public function editUserAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('CoolvoiturageApiBundle:User')->find($request->get('id'));

        $user->setNom($request->get('firstname'));
        $user->setPrenom($request->get('lastname'));
        $user->setEmail($request->get('mail'));
        $user->setEmailCanonical($request->get('mail'));
        $user->setUsername($request->get('firstname') . $request->get('lastname'));
        $user->setEnabled(true);
        $user->setTelephone($request->get('phone'));
        $date = new DateTime($request->get('birthdate'));
        $user->setDateNaissance($date);


        $em->persist($user);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($user);
        return new JsonResponse($formatted);

    }


    public function editUserMdpAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('CoolvoiturageApiBundle:User')->find($request->get('id'));

        $user->setPassword($request->get('mdp'));

        $em->persist($user);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($user);
        return new JsonResponse($formatted);

    }


    public function disableAccAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('CoolvoiturageApiBundle:User')->find($request->get('id'));

        $user->setEnabled(false);

        $em->persist($user);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($user);
        return new JsonResponse($formatted);

    }

}