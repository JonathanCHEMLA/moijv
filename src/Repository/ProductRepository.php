<?php
//c est la classe qui permet de gerer les requetes

namespace App\Repository;

use App\Entity\Product;
use App\Entity\Tag;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findPaginated($page=1)
    {
        //cree un outil qui permet de generer des requetes. on recherche par id, dans l'ordre croissant
        $queryBuilder = $this->createQueryBuilder('p')
        ->leftJoin('p.owner','u')//p.owner_id=u.id
        //le u du dessous permet de faire un SELECT u.*
        ->addSelect('u')   
        ->leftJoin('p.tags','t')
        ->addSelect('t')
        ->orderBy('p.id', 'ASC');//l'alias est obligatoire et mettre tous les alias de la requete(meme max,min...)
        //on a besoin d'un intermediaire pour aller a pagerfanta car pagerfanta est generique:il peut sadapter a plusieurs ORM(ex: elastic search...)
        $adapter = new DoctrineORMAdapter($queryBuilder);
        //on cree un objet fanta 
        $fanta = new Pagerfanta($adapter);
        //permet de definir quelle est la page courante et le nb max par page
        return $fanta->setMaxPerPage(12)->setCurrentPage($page);
        
    }
 
    //retourne les produits que d'un seul utilisateur
    public function findPaginatedByUser(User $user, $page=1)
    {
        //cree un outil qui permet de generer des requetes. on recherche par id, dans l'ordre croissant
        // 'p' est relié à produit grace au fait que createQueryBuilder est relie a ServiceEntityRepository et que ce dernier possede un construct, construisant à partir de la class Product, bref, entity product
        // le p du dessous permet de faire un SELECT p.*
        $queryBuilder = $this->createQueryBuilder('p')

            //on a mis u arbitrairement, mais on aurait pu mettre o, comme owner
            //left: si il n y a pas de user correspondant, tu prend qand meme le produit.
            //right: meme s il n 'y pas de produit associe, tu prend qd meme le user
            //inner; tu ne prend que ceux pour lesquels il y a une correspondance.
            //full-inner: tu prend tout! meme ceux qui n ont pas de correspondant dans les user et les produits
            ->leftJoin('p.owner', 'u')
            //le u du dessous permet de faire un SELECT u.*
            ->addSelect('u')   
            ->leftJoin('p.tags','t')
            ->addSelect('t')
            ->where('u=:user')
            ->setParameter('user',$user)    //user_id=[ce qui est passe en parametre, par ex 7]
            ->orderBy('p.id', 'ASC');//l'alias est obligatoire et mettre tous les alias de la requete(meme max,min...)
            
        //on a besoin d'un intermediaire pour aller a pagerfanta car pagerfanta est generique:il peut sadapter a plusieurs ORM(ex: elastic search...)
        $adapter = new DoctrineORMAdapter($queryBuilder);
        //on cree un objet fanta 
        $fanta = new Pagerfanta($adapter);
        //permet de definir quelle est la page courante et le nb max par page
        return $fanta->setMaxPerPage(12)->setCurrentPage($page);
        
    }
    

//    /**
//     * @return Product[] Returns an array of Product objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

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
//findPagined est pour la vue home, et findPaginedById, pour la vue index.En vrai, on peut meme re-utiliser findPaginedById par ex pour que l'admin puisse connaitre les pdts d'un user donné.
//where permet de filtrer :uniquement les prdt de tel user.
//setParameter est un equivalent du bindvalue, mais ici, c est fait sur un objet 
// $user va contenir tout le user:nom,prenom,id_user,adresse..., de meme que le marqueur :u.  doctrine selectionnera ce qui l'interresse uniuqement, pour faire sa requ: donc uniquement l'id-user.

// on  veut, a present, en cliquant 
//qu on veut retourner des PRODUIT, il faudra donc coder dans PRODUCTrepository.
// et quand on cherhce a recuperer des tags, c est dans tagrepository.


    public function findPaginatedByTag(Tag $tag, $page=1)
    {

        $queryBuilder = $this->createQueryBuilder('p')
            //les 2 lignes ci dessous reqstnt qd meme utiles, car c est en raport avec l'user connecté
            ->leftJoin('p.owner', 'u')
            ->addSelect('u')   
            ->leftJoin('p.tags','t')
            ->leftJoin('p.tags','t2')
            ->addSelect('t')
            ->where('t2=:tag')
            ->setParameter('tag',$tag)    //user_id=7
            ->orderBy('p.id', 'ASC');
            //cela donne SELECT p.*,u.*,t.* FROM PRODUCTI INNERJOIN USER u,INNERJOIN Tag t, INNERJOIN Tag t2 WHERE t2.id=7

        $adapter = new DoctrineORMAdapter($queryBuilder);

        $fanta = new Pagerfanta($adapter);

        return $fanta->setMaxPerPage(12)->setCurrentPage($page);
        
    }
    //1 produit appartient à 1( ou 2 categories) 
    // un slug est une version URL d un mot
    // dans les habits, les categories sont:les pulls, les pantalons... tandis que les tags sont, pour les pantalons:les jeans, les pantalons habilles... 

    
}