<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
        /**
     * @Route("/", name="root")
     */     
    public function root()
    {
        return $this->redirectToRoute("home");  //redirige vers la route ayant le nom name="home"
    }
      /**
     * @Route("/home", name="home")
     * 
     */
        public function index(UserRepository $userRepo)
    {
        $message = 'Bonjour à tous';

        return $this->render("home.html.twig");
    }
}
