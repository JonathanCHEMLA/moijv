<?php

namespace App\Controller; //il faut ouvrir les accolades avant! merci Nicolas !! ;)


use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     * la regexp "\d+" signifie que l'on demande la saisie d'un ou plusieurs digit(=chiffres)
     * @Route("/product/{page}", name="product_paginated", requirements={"page"="\d+"})
     */
    public function index(ProductRepository $productRepo, $page=1)
    {
        $productList=$productRepo->findPaginated($page);
        return $this->render('product/index.html.twig', [
            'products' => $productList
        ]);
    }

    
    /**
     * @Route("/product/delete/{id}", name="delete_product")
     * 
     */    
    public function deleteProduct(Product $product, ObjectManager $manager)
    {
        $manager->remove($product);
        $manager->flush();
        return $this->redirectToRoute('product');
    }
    
    
    //request contient toutes les superglobales(get,post,server...,session). 
    //Il permet de gerer(lire,ecrire) toutes les requetes, en mode Objet au lieu du mode Array
     /**
     * //voici la liste des chemins qui affichent la page "product/editproduct.html.twig" : 
     * "/product/add" et "/product/edit/{id}"
     * 
     *       //dans ce mode, le formulaire sera presenté vide
     * @Route("/product/add", name="add_product")
     * 
     *       // dans ce mode, le formulaire sera pré-rempli
     * @Route("/product/edit/{id}", name="edit_product")
     */ 
    public function editProduct(Product $product = null, ObjectManager $manager,Request $request)
    {
        // "$product=null" car si c'est une insertion, il n'ya pas de produit à passer en parametre
        if($product===null){
            $product = new product();
        }
        $formProduct = $this->createForm(ProductType::class, $product)
            ->add('Envoyer', SubmitType::class);
        
        $formProduct->handleRequest($request);  //si le user a cliqué sur "valider" c'est ici que c'est géré
        
        //todo insertentity after validation
        if($formProduct->isSubmitted() && $formProduct->isValid()) {
            //le formulaire est retourné et que tous les assert(de notre entity Product) ont ete validé
            $manager->persist($product);
            //flush envoie les infos a la bdd et vide ensuite le formulaire
            $manager->flush();
            return $this->redirectToRoute('product');
        }
        return $this->render('product/edit_product.html.twig',[
           'form'=>$formProduct->createView() 
        ]);
        
    }
    
    
}
