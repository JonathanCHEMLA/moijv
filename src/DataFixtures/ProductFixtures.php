<?php

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
           $prod->setowner($this->getReference('user'.rand(0,59)));
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
            UserFixtures::class
        ];
    }
}
