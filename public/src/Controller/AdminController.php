<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
      /**
     * @Route("/admin/dashboard", name="admin_dashboard")
     */
    public function index(UserRepository $userRepo)
    {
        $message = 'Bonjour à tous';
        //$userRepo est passé automatiquement en paramètre par Symfony
        // ->injection de dépendance. On n'a donc pas à l'instancier nous-meme
        // $userRepo effectuera ici un SELECT * FROM user ...
        //$userList=$userRepo->findBy(['registerDate' =>new \DateTime('now')],'registerDate DESC',10);
        $userList=$userRepo->findAll();
        //print_r($userList);
        return $this->render("admin/dashboard.html.twig",[
            'users'=>$userList]);
    }
}
