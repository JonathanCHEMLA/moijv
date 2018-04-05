<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * 
 * @Route("/tag")
 */
class TagController extends Controller
{
    /**
     * //En cliquant sur un lien, l'user declenchera l'url /tag/{le slug de notre produit}/product
     * //path pointe sur LE NOM DE LA ROUTE
     * @Route("/{slug}/product", name="tag")
     * // '/product' a ete rajoute car generalement on ne tag pas que des pdts! on tag aussi des user...
     * @Route("/{slug}/product/{page}", name="tag_paginated")
     */
    public function product(ProductRepository $productRepo, Tag $tag, $page=1)
    {
        //ici, par rapport a productController, on a importe en plus, dans function product,  Tag $tag afin d'etre en adequation avec productRepository
        $tagProductList=$productRepo->findPaginatedByTag($tag,$page);
        //ici, findPaginatedByTag contient, en parametre $tag au lieu de $this->getTag(). $tag c'est parcequ'on recupere son slug DANS L'URL. $this->getUser() permet de recuperer l'user DANS LA SESSION 
        
        return $this->render('tag/product.html.twig', [
            'tagProducts' => $tagProductList,
            'tag'=>$tag
            //on veut passer notre vue a ce tag car a priori on va ensuite faire une requete
        ]);
    }
}
