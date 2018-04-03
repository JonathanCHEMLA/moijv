<?php

namespace App\Entity;    //pour la bdd. ex le cp:  entier
// pour la vue. ex; le cp: 5 caracteres


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Collection;

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
     * @ORM\Column(type="string", length=255)
     * //la ligne du dessous permet de controler, avant insertion, que l'user cherche bien a inserer une image
     * //cette regle ne s applique qu'en cas d insertion. NotBlank="pas vide"! il faut metre quelqu chose.
     * //je ne veut obliger(par le biais de NotBlank) mon user a choisir une image qu'en cas d'insertion: Si l'user modifier son produit, on lui imposera pas de réuploader sa photo.
     * //assert c est les contraintes. Asset est le nom que l'on donne a notre dossier , contenant les fichiers js,image...
     * //le champ ne doit pas etre blans,vide si on est en mode insertion. cette restriction ne s'applique qu'en cas d'insertion:
     * @Assert\NotBlank(groups={"insertion"})
     * //tandis que la restiction sur l'image s'applique tout le temps. assert image verifie que c'est une image et aussi que c'est bien un fichier
     * @Assert\Image(
     * maxSize = "2M",
     * minWidth = "200",
     * minHeight = "200"
     * )
     * @var object
     */
    private $image;    
    
    
     /**
     * ci dessous, on declare que notre owner est un objet de type User, (donc de l'entity User)
     * @ORM\ManyToOne(targetEntity="User", inversedBy="products") 
     * @var User owner
     */   
    private $owner;
    
     /**
     * dans mon entité "Tag" les produits s'appeleront "products"
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="products") 
     * @var Collection
     */   
    private $tags;

    public function __construct()
    {
        // ArrayCollection= un Array orienté objet.
        $this-> tags=new ArrayCollection();
    }
    public function getTags(): Collection {
        return $this->tags;
    }


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
    
    public function getImage() 
    {
        return $this->image;
    }
    public function setImage($image) 
    {
        $this->image = $image;
        
        return $this;
    }
// make:migration  permet de creer le fichier "version"
//migrations:migrate nous a rajouté une colonne "image" dans notre bdd


}
