<?php
// ce fichier n'est ni un controller, ni un model. c'est uniquemnet pour le dev'.
// doctrine:fixtures:load permet de regenerer nos 150 fixtures dans notre base de donnees.
namespace App\DataFixtures;//(attention a ne pas l'oublier: ctrl+shift+i)


use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        for($i=0; $i<150;$i++)
        {
           $prod = new Product();
           $prod->setTitle('produit '.$i);
           $prod->setDescription("Description de mon produit n°$i");     
           $prod->setImage("uploads/500x325.png");  
           //un produit est depose par un seul et unique user choisi au hasard parmi les 60 user
           $prod->setowner($this->getReference('user'.rand(0,59)));
           for($j=0;$j<rand(0,4);$j++)
           {
               // des references ce sont des objets et non pas des id ou des names...
               //addRef->getRef. this est "l'objet qui permet de generer des ProduitsFaux" et non pas un "Produit" 
               $tag=$this->getReference('tag'.rand(0,39));
               
               //dans product.php,
               //on ajoute ce tag a ma liste de tags de mon produit
               // cela fait aussi l'inverse: ca ajoute mon produit a la liste des produits de mon tag
               // et cela evite les doublons:
               $prod->addTag($tag);
           }
           
           //manager persist(=enregistre) demande a doctrine de prepare l'insertion de 
           //l'entité en BDD. Cela revient à demander un INSERT INTO/UPDATE
           $manager->persist($prod);
        }
        // flush valide les requetes SQL et les execute
        $manager->flush();

    }
    public function getDependencies(): array
    { // sert a dire que productsfixtures ne doit pas s'executer avant userfixtures(en effet, l'execution des fixtrues se fait par ordre alphabetique) 
        return [
            UserFixtures::class,
            TagFixtures::class
        ];
    }
}
