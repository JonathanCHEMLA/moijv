<?php
//gere la page d'accueil: home
namespace App\Controller;

use App\Repository\ProductRepository;
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
       * //pour afficher la 1er page paginée, par defaut:
     * @Route("/home", name="home")
       * //pour afficher une page precise
     * @Route("/home/{page}", name="home_paginated")
     * //ctrl+Maj+fleche du bas
     */
    
    // DANS LE MODEL MVC, "UNE METHOD" D UN CONTROLLER S APPELLE "UNE ACTION"
    public function index(ProductRepository $productRepo, $page=1)
    {
        //le model ne fera pas la tache:il deleguera la demande a doctrine
        //je transmets mes $products à ma vue "home.html.twig".
        //il y a 2 possibilites des lors qu'on code un objet: 
        //pour le creer:   IL FAUT UN ...=new...! 
        //pour l'utiliser: IL NE FAUT PAS le ... = new...!
        $products = $productRepo->findPaginated($page);//dans productRepository
        
        return $this->render("home.html.twig",[
            'products' => $products
        ]);
    }
}
