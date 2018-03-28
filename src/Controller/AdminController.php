<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
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

      /**
     * @Route("/admin/user/delete/{id}", name="delete_user")
     */    
    public function deleteUser(User $user, ObjectManager $manager)
    {
        $manager->remove($user);    // pour demander de supprimer
        $manager->flush();  // pour executer les requetes
        
        return $this->redirectToRoute("admin_dashboard");
    }
}
