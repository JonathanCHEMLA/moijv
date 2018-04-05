<?php

namespace App\DataTransformers;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\DataTransformerInterface;

class TagTransformer implements DataTransformerInterface
{
    
    /**
     *
     * @var TagRepository
     */
    private $tagRepo;
    
    // le Model du MVC se decompose en 2 : ce qui sert a represneter les données(entity, et tt ce qui concerne la bdd), et TOUT CE QUI N EST PAS UTILISE PAR LA BDD(les services) . en plus des 2, on a: (les fixtures et les migration servent simplement dans le developpement) 
    public function __construct(TagRepository $tagRepo)
    {
        // pour utiliser un repository dans un service on ne peut que l'injecter dans le constructeur de ce service. Alors que dans les controller on peut les injecter dnas n importe quelle methode.
        //plug-inn = paquet= programme
        //librairie :on peut utiliser les elements ou pas. Framework : on doit travailler avec les elements
        $this->tagRepo = $tagRepo;
        
    }
    
    public function reverseTransform($tagString) {
        //explode: chaine->Array   ->collection de tags
        
        //array_unique() sert a se premunir contre le risque que l'user rentre 2 fois le meme tag
        $tagArray = array_unique(explode(',', $tagString));
        //on crée un nouveau Tableau, orienté Objet, qui sera appelé $tagCollection:
        $tagCollection = New ArrayCollection();
        foreach ($tagArray as $tagName) {
            $tagCollection->add($this->tagRepo->getCorrespondingTag($tagName));
        }
        return $tagCollection;
        

    //mr wong modele lenovo modele ideapad tm110 usb3.0 mopf9xb7326073 110-15acl 20volt 2.25A 80tj chargeur 23€ lundi ;
    }

    public function transform($tagCollection) {
        //collection de tags -> Array -> chaine
        //implode: Array->chaine
        
        //array_map(function, array)
       $tagArray= $tagCollection->toArray();
       $nameArray= array_map(function($tag){return $tag->getName();},$tagArray);
       //foreach($tagArray as $tag)
       //{
       //   $nameArray[]=$tag->getName();
       //}
        return implode(',',$nameArray);
    }

}
