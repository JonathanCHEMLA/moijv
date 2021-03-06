<?php
//sert a gerer mes produiits
namespace App\Controller; //il faut ouvrir les accolades avant! merci Nicolas !! ;)


use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * //ci-dessus, il faut mettre 2 * et non 1 sinon, il le prend pour un commentaire et non comme une annotation.
 *@Route("/product")
 */

class ProductController extends Controller
{
    /**
     * @Route("/", name="product")
     * la regexp "\d+" signifie que l'on demande la saisie d'un ou plusieurs digit(=chiffres)
     * //cette ligne ci-dessous contient le reuqirements afin de pas rentrer en colision avec product/2, product/3 ...
     * @Route("/{page}", name="product_paginated", requirements={"page"="\d+"})
     */
    //ProductRepository $productRepo est l'import du repository
    public function index(ProductRepository $productRepo, $page=1)
    {
        //injecté comme dependance:ProductRepository $productRepo
        //injecté dnas l'url:$page=1
        //cmt savoir que Controller,sité ci-dessus, est relié a l'entity user? RTFM(lis la ... de manuel/documentation)
        $productList=$productRepo->findPaginatedByUser($this->getUser(),$page);
        return $this->render('product/index.html.twig', [
            'products' => $productList
        ]);
    }
    // A LA DIFFERNCE DE THROW, RETURN laisse le message d'erreur et ne sera capture que par PHP.
    // Throw permetd'utiliser un CATCH, derriere, afin de gerer nous meme une mauvaise manipulation de l'user.
    // les erreurs de 400(403,404..) c'est pas notre pb a nous, le programmeur.
    // Par contre les erreur 500 c'est notre pb. Ca veut dire qu'on a mal fait notre work
    /**
     * @Route("/delete/{id}", name="delete_product")
     * 
     */    
    //ObjectManager $manager ca sert pâs a faire des requetes de select mais ca sert a faire des requetes de insert,update ou delete
    public function deleteProduct(Product $product, ObjectManager $manager)
    {
        //injecté comme dependance: ObjectManager $manager
        //injecté dnas l'url ET CONVERTI A LA VOLEE SOUS LA FORME D UN PRODUIT: Product $product
        //this est le controller.         
        //si le propriet du prod a un id different de celui du produit courabnt:
        // voir ligne 43 dans product.php
        if($product->getOwner()->getId() !== $this->getUser()->getid()){
            //createAccessDeniedException est une fonction prédéfinie qui genere une exeption=msg d erreur.une exeption esty un objet qui incarne une erreur. c'est un cas de figure qui n est pas sense se produitre mais qui peut se produire.
            //normalement une exeption ca s envoie, avec un throw. une exeption, tznt qu elle n est pas capturee elle continue de se propager. 
            throw $this->createAccessDeniedException('You are not allowed to delete this product');
        }
        $manager->remove($product);
        $manager->flush();
        return $this->redirectToRoute('product');
    }
    
    
    //request contient toutes les superglobales(get,post,server...,session). 
    //Il permet de gerer(lire,ecrire) toutes les requetes, en mode Objet au lieu du mode Array
     /**
     * //voici la liste des chemins qui affichent la page "product/editproduct.html.twig" : 
     * "/product/add" et "/product/edit/{id}"
     * 
     *       //dans ce mode, le formulaire sera presenté vide
     * @Route("/add", name="add_product")
     * 
     *       // dans ce mode, le formulaire sera pré-rempli
     * @Route("/edit/{id}", name="edit_product")
     * //CHACUNE DE CES 2 ROUTES ENTRAIENENT L EXECUTION DE CETTE FONCTION "EDIT PRODUCT"
     */ 
    public function editProduct(Product $product = null, ObjectManager $manager,Request $request)
    {
        // Request $request est passe en parametre pour pouvoir executer l'etape handleRequest, plus bas
        // "$product=null" car si c'est une insertion, il n'ya pas de produit à passer en parametre
        //produit n'exsite pas :on est en mode insertion
        if($product===null){
            $product = new product();
            $group='insertion';
        }
        // produit existe: on est en mode edition
        else
        {
            //on recup l'image et la converti en fichier
            //je convertis mon image (qui est un string), en objet File avant de passer $product a mon formulaire
            $oldImage=$product->getImage();
            //on a besoin de transformer notre image qui est une chaine de caracteres (stocké en bdd), en fichier donc en objet.
            $product->setImage(new File($product->getImage()));
            $group='edition';
            
        }
        //c'est dans la ligne dessous que mon produit est passé dans mon formulaire 
        $formProduct = $this->createForm(ProductType::class, $product,['validation_groups'=>[$group]])
            ->add('Envoyer', SubmitType::class);
        //on dit a notre formulaire de gerer la requete.pb:en Web,il n'y a aps moyen de preremplir un champ file dans un champ html.
        $formProduct->handleRequest($request);  //si le user a cliqué sur "valider" c'est ici que c'est géré
        
        //todo insertentity after validation
        if($formProduct->isSubmitted() && $formProduct->isValid()) {

            
            //le proprietaire du produit est l'user qui est connecté:
            $product->setOwner($this->getUser());
            //image est ,pour l instant un fihcier.            
            $image=$product->getImage();
            if($image===null){
            //on est donc forcement en mode edition.car en insertion, le champ image est obligatoire(voir product.php,le NotBlanck ).                
                
                //si l'user n'a pas selectionné d'image, alors l'image, à enregistrer dans la bdd, sera supprimée et sera recréée avec le meme chemin que celui qui etait enregistre avant dans la bdd. 
                $product->setImage($oldImage);
            }else{
            //$image instanceOf File;   permet de debbuger
            //je recupere mon fichier, et je le deplace (avec la methode move, dans le dossier uploads, en gerant un nom aléatoire,ici uniqid:
            //hacher signifie transformer en une chaine de caratere, a partir de laquelle on ne peut pas revenir ensuite au nom de depart.
            //guessExtension car un hacker pourrait vouloir hacker l'extension. Php sait reconnaitre l'extension d'un fichier sans qu'on le lui dise.
            //move(nomdudossierousetruvelimage,nouveaunomdelimagequiluiseraattribue)
            //guessExtension car l'user a tres bien pu modifier l'extension de son fichier php->jpg par ex, afin de hacker mon site et obtenir les infos secretes de mon site .symfony inspexcte le contenu du fchier et essaie de deviner s'il s'agit d'un jpg ou d'un php ou d'autre chose.
                $newFileName=md5(uniqid()) . '.' . $image->guessExtension();
               //je deplace $newFileName d'une localisation temporaire et le mets dans le dossier uploads
                $image->move('uploads',$newFileName );
            //getpathname est une methode de l'objet File.Le pb est que l'adresse qu'il renvoie est l'adresse temporaire, qui 'effacera à l'issue de la manip; ce qu'on ne souhaite pas. 
            //mise a jour du nom de fichier dans la bdd. c est une trace de la création physique du fihcier dans le dosssier uploads
                $product->setImage('uploads/'.$newFileName);
            }
            //le formulaire est retourné et que tous les assert(de notre entity Product) ont ete validé
            //persist= on enregistre dans notre bdd
            $manager->persist($product);
            //flush envoie les infos a la bdd et vide ensuite le formulaire
            $manager->flush();
            //on le redirige vers la route qui s'appelle product
            //redirect fait une redirection vers une page controler
            return $this->redirectToRoute('product');
        }
        //render affiche un template
        return $this->render('product/edit_product.html.twig',[
           'form'=>$formProduct->createView() 
        ]);
        
    } 
    
}
//tous les ORM ne sont pas Doctrine mais Doctrine est un ORM
//prodct repository n'affiche rien. Il recoit de la donnée
//l'url nous a envoyé une page, le controler envoie cette page au repository
//le controller ne fait que superviser. C est utile pour reutilisabilité du code
// les vendor sont des modele 100% reutilisables.
// quand on a resolu un pb, on na pas envie de le resoudre a chaque fois.
//@method: c est pour la documentation. on declare a  notre id les methodes qu il  peut utilser.
// $querybuilder: c est ce qui sert a contrsuire une requ(en sql,mongodb...). C'est un objet qui est crée des ->createQueryBuilder. il faut que ma table courante(donc la table produit) ait un alias(d ou 'p')
//les tables doivent etre vu non c des table mais c des entite. Car en sql on va relier p.owner_id=u.id
//on aurait pu faire un leftjoin car tous les pdts sont associes a un user. En revanche, on n aurait pas pu faire un rightjoin car tous les user n ont pas des produits.
//addselect c st pour rajouter a ma requete toutes les colnnes de mon utilisateur
//findPagined est pour la vue home, et findPaginedById, pour la vue index.
//