<?php

namespace App\Controller;

use App\Entity\Tag;
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
     * @Route("/{slug}/product", name="tag")
     */
    public function product(Tag $tag)
    {
        
        return $this->render('tag/product.html.twig', [
            'controller_name' => 'TagController',
        ]);
    }
}
