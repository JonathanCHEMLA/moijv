<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for($i=0; $i<60;$i++)
        {
           $prod = new Product();

           $prod->setTitle('produit '.$i);
           $prod->setDescription('produit '.$i);           
 
           //manager persist demande a doctrine de prepare l'insertion de 
           //l'entité en BDD. Cela revient à demander un INSERT INTO/UPDATE
           $manager->persist($prod);
        }
        // flush valide les requetes SQL et les execute
        $manager->flush();

    }
}
