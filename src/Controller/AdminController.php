<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
      /**
     * @Route("/admin/dashboard", name="admin_dashboard")
     */
    public function index(UserRepository $userRepo)
    {
        $message = 'Bonjour à tous';
        //$userRepo est passé automatiquement en paramètre par Symfony
        // ->injection de dépendance. On n'a donc pas à l'instancier nous-meme
        // $userRepo effectuera ici un SELECT * FROM user ...
        //$userList=$userRepo->findBy(['registerDate' =>new \DateTime('now')],'registerDate DESC',10);
        $userList=$userRepo->findAll();
        //print_r($userList);
        return $this->render("admin/dashboard.html.twig",[
            'users'=>$userList]);
    }

      /**
     * @Route("/admin/user/delete/{id}", name="delete_user")
     */    
    public function deleteUser(User $user, ObjectManager $manager)
    {
        $manager->remove($user);    // pour demander de supprimer
        $manager->flush();  // pour executer les requetes
        
        return $this->redirectToRoute("admin_dashboard");
    }

     /**
     * @Route("/admin/user/add", name="add_user")
     * @Route("/admin/user/edit/{id}", name="edit_user")
     */    
    public function editUser(User $user = null,Request $request, ObjectManager $manager)
    {
        if($user===null){
            $user = new User();
        }
        $formUser = $this->createForm(UserType::class,$user)
                ->add('Envoyer', SubmitType::class);
        
        $formUser-> handleRequest($request); // declenche la gestion du formulaire
        
        // ... todo : validation du formulaire
        
        if($formUser->isSubmitted() && $formUser->isValid())
        {
            //enregistrement de notre utilisateur:
            $user->setRegisterDate(new \DateTime('now'));
            $user->setRoles('ROLE_USER');
            //mettre dans la bdd
            $manager->persist($user);
            //remettre à 0
            $manager->flush();
            return $this->redirectToRoute("admin_dashboard");
        }
        
        return $this->render('admin/edit_user.html.twig',[
            'form' => $formUser->createView()
        ]);
        
    }

    
    
}
