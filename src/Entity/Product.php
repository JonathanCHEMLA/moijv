<?php

namespace App\Entity;    //pour la bdd. ex le cp:  entier
// pour la vue. ex; le cp: 5 caracteres


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @UniqueEntity("title")
 * // "unique coté application (pareil que pour l'exemple du cp
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
     * 'cascade=persist' signifie qu on lui demande que si mon pdt est sauvegarde, les tags associes seront enregistres ensuite. CA NE SERT QUE POUR DES TAGS QUI SONT ENREGISTRES POUR LA 1ere FIOS DANS LA BDD
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="products", cascade="persist") 
     * @var Collection
     */   // $tags est relié a la classe Tag grace a l'anotation du dessus:targetEntity="Tag"
    private $tags;

    public function __construct()
    {
        // ArrayCollection= un Array orienté objet.
        //arraycollection implement bien la table Collection:voir au dessus "var Collection"
        $this-> tags=new ArrayCollection();
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
    
    public function addTag($tag)
    {
        // fct qui prendra en parametre le tag a ajouter
        // tags est notre collection(voir ligne 69 et 75). contains() est une method de arraycollection et qui implemente Collection
        if($this->tags->contains($tag))
        {//si les tags du produits contienent deja le tag qu'on essaie d'ajouter, alors il sort aussitot de la fct.
            
            return;//le return fait directement sortir de la fct
        }
        //on ajoute le tag a la liste des tags du produit
        // chauqe prdt a des tags. j'ajoute un tag
        $this->tags->add($tag);
        // $tag, provenant de fixutures est passee en parametre. Getproduct vient de la class tag. on lui rajoute this qui est ici un pdt
        $tag->getProducts()->add($this);
    }
    public function getTags(): Collection 
    {
        //exporte la valeur tags et nous retourne une arraycollection tags
        return $this->tags;
    }    
// c'est le if qui permet de se premunir contre les doublons.
    public function setTags(Collection $tags)
    {
        //importe une collection de $tags et fixe la valeur à la variable tags
        $this-> tags= $tags;
        return $this;
    }

}// Aller sur github.com/Cevantime/moijv et cliquer sur 10 commit, puis sur le code chiffré
