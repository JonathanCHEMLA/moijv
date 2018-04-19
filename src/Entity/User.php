<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Serializable;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 */
class User implements UserInterface, Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     * @Assert\Length(min=2, max=50)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2, max=50)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registerDate;
    
     /**
     * @ORM\Column(type="string", length=100)
     */
    private $roles;

     /**
     * //la ligne ci dessous signifie qu'un user aura plusieurs produits
     * @ORM\OneToMany(targetEntity="Product", mappedBy="owner")
     * // indique que lorsqu'il créera des getter et setter, il faudra qu'il les crée pour la class Collection products
     * @var Collection products
     */    
    private $products;  //objet de la class objetcollection et qui contiendra la liste de tous les prod d un user
    
    public function __construct() {
        $this->products=new ArrayCollection();
    }    
    public function setRoles($roles) {
        $this->roles = $roles;
    }
    //pour generer automatiquement les getter/setter: alt+inser puis selectionner getter/setter 
    public function getProducts(): Collection {
        return $this->products;
    }
  
        public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    public function setRegisterDate(DateTimeInterface $registerDate): self
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        /*explode transforme en tableau*/
        return explode('|',$this->roles);
    }

    public function getSalt() {
        return null;
    }

    public function serialize(): string {
        /*enregister uniquement ce qui doit etre stocké en session: id,(username),mdp, email*/
        return serialize(array(
            $this->id,
            $this->username,
            $this->password

        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password
        ) = unserialize($serialized);        
    }

}
