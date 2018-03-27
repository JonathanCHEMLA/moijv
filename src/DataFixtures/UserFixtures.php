<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=0; $i<60;$i++)
        {
           $user = new User();
           $user->setUsername('user'.$i);
           //on protege le mdp avec la methode PASSWORD_BCRYPT
           //le mot de passe de tous nos users factice sera le meme: 'user'
           $user->setPassword(password_hash('user',PASSWORD_BCRYPT));
           $user->setEmail('user'.$i.'@fake.fr');
           $user->setRegisterDate(new \DateTime('-'.$i.' days'));
           
           //manager persist demande a doctrine de prepare l'insertion de 
           //l'entité en BDD. Cela revient à demander un INSERT INTO/UPDATE
           $manager->persist($user);
        }
        // flush valide les requetes SQL et les execute
        $manager->flush();
    }
}
