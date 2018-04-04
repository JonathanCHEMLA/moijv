<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 */
class Tag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30,unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=30,unique=true)
     */
    private $slug;
    
     /**
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="tags")
     * @var Collection
     */   
    private $products;
    
    public function __construct() {
        //le constructeur est utilise au moment ou mon obj est cree et sert à initialiser les champs de mon objet.
        // comme il y a plusieurs types de collections, a part Array collection, Doctrine nous laisse faire le constuct. Sinon Doctrine l'aurait fait pour nous.
        $this->product=new ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
    
    public function getProducts(): Collection 
    {
        //comment generer le lien avec nos tags???????????????
        return $this->products;
        //on fait ensuite un make:migration. C'est la migration qui sert a exprimer le lien many to many
    }


}
