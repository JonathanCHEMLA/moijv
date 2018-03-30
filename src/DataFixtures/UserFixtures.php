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
           $user->setRoles('ROLE_USER');
           //addReference est une methode dans Fixture ou une classe parente au dessus encore.
           //addReference garde en référence notre $user sous un certain nom, de façon à le rendre disponible dans les autres fixtures
           $this->addReference('user'.$i,$user);
           
           //manager persist demande a doctrine de prepare l'insertion de 
           //l'entité en BDD. Cela revient à demander un INSERT INTO/UPDATE
           $manager->persist($user);
        }
        $admin= new user;
        $admin->setUserName('root');
        $admin->setPassword(password_hash('admin',PASSWORD_BCRYPT));
        $admin->setEmail('admin@mail.fr');
        $admin->setRegisterDate(new \DateTime('now'));
        $admin->setRoles('ROLE_USER|ROLE_ADMIN');
        
        
        $manager->persist($admin);
        
        // flush valide les requetes SQL et les execute
        $manager->flush();
    }
}
