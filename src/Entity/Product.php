<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;    //pour la bdd. ex le cp:  entier
use Symfony\Component\Validator\Constraints as Assert;// pour la vue. ex; le cp: 5 caracteres
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @UniqueEntity("title")// "unique coté application (pareil que pour l'exemple du cp
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, unique=true)//"unique" coté bdd (idem que ex du cp)
     * @Assert\Length(min=3, max=50)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=15)
     */
    private $description;
    
     /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="products") 
     * @var User owner
     */   
    private $owner;
    public function getOwner(): User {
        return $this->owner;
    }

    public function setOwner(User $owner) {
        $this->owner = $owner;
        return $this;
    }

        public function getId()
    {
        return $this->id;
    }
    
    public function getTitle()
    {
        return $this->title;
    }


    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
