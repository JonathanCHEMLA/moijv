<?php

namespace App\Repository;

use App\Entity\Tag;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tag|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tag|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tag[]    findAll()
 * @method Tag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        //ce que la ligne du dessous signifie: ce construct sert a dire que le repositoryTag se refere a la class Tag:(Tag::class)
        parent::__construct($registry, Tag::class);
    }
    
    
    // L'annotation peut être générée automatiquement en tapant  :   /**   puis   entrée
    
    /**
     * 
     * @param string $tagName the name of the tag we are looking for
     * @return Tag the corresponding tag in db or a new Tag instance if no
     * corresponding tag is found
     * //retourne soit le tag corresponant en bdd soit une instance de Tag si le tag correspondant n'a pas ete trouvé
     * 
     * ORM sert, par le biais de DOCTRINE a faire le lien entre la BDD et PHP.
     * un NAMESPACE sert a ce qu il n'y ait pas de collision entre les noms de classe.
     * Having sert à se depatouiller lorsqu on n a pas reussi a le faire avec Where. having implique: une requete imbriquee derriere car on obtient une liste qu'il faut filtrer ensuite
     * a un commercial: "je sais faire!"
     * à un technique: "reconnaitre qu'on ne sait pas"
     * // la ligne de documentation du dessus est en anglais car si on l'avait tapée en francais, on aura un message d'erreur sur github.
     * // c'est lu par NetBeans pour que NetBeans puisse faire ensuite, avec cela, de l'auto-completion
     * //pour trouver le slugify, rechercher en tapant dans google:  "slug php"
     * // on a ensuite tape dans la console:    "composer require cocur/slugify"
     * //la classe s'installe ensuite dans les vendor
     */   
    
    public function getCorrespondingTag($tagName){
        //on va obtenir le tag entier a partir du NOM de tag qu'on lui transmet en parametre 
        $slugify = new Slugify();
        //cet objet slugify transforme les objet en slug, en appelant la methode slugify et me retourne le slug.
        $tagSlug = $slugify -> slugify($tagName);
        //dans le cas de l'utilistion de JOIN, en tappant t.*, il ne me retourne que les collones de la table tag.
        //SELECT t.* FROM TAG t WHERE slug= :tagslug LIMIT 1 (LIMIT 10 revient au meme que d ecrire LIMIT 0,10) 
        $tag = $this -> findOneBy(['slug'=>$tagSlug]);
        
        if(!$tag){
            $tag = new Tag();
            $tag->setSlug($tagSlug);
            $tag->setName($tagName);
        }
        return $tag;
    }

            
//    /**
//     * @return Tag[] Returns an array of Tag objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tag
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
