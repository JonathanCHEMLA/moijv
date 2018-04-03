<?php
//c est la classe qui permet de gerer les requetes

namespace App\Repository;

use App\Entity\Product;
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
        $queryBuilder = $this->createQueryBuilder('p')->orderBy('p.id', 'ASC');//l'alias est obligatoire et mettre tous les alias de la requete(meme max,min...)
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
        $queryBuilder = $this->createQueryBuilder('p')
            //on a mis u arbitrairement, mais on aurait pu mettre o, comme owner
            //left: si il n y a pas de user correspondant, tu prend qand meme le produit.
            //right: meme s il n 'y pas de produit associe, tu prend qd meme le user
            //inner; tu ne prend que ceux pour lesquels il y a une correspondance.
            //full-inner: tu prend tout! meme ceux qui n ont pas de correspondant dans les user et les produits
            ->leftJoin('p.owner', 'u')
            ->where('u=:user')
            ->setParameter('user',$user)
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
}
