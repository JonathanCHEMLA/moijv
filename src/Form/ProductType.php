<?php
// c est pour le formulaire des produits
//c est un service. c est lui qui va gerer notre formulaire produits. il gere tout ce qui est en rapport avc notre formulaire
namespace App\Form;
//pas de pb que textarea soit declare ci dessous et a la ligne 19.


use App\DataTransformers\TagTransformer;
use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    private $tagTransformer;
    
    public function __construct(TagTransformer $tagTransformer) {
        $this->tagTransformer=$tagTransformer;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //cette fct sera appelée chaque fois qu on fera une : initiatilisation(donc champs vides), un enregistrement, ainsi que pour une mise a jour
        $builder
            ->add('title')
            ->add('description',TextareaType::class)
                //FileType est le bouton sur lequel le user clique pour choisir l'image
            ->add('image', FileType::class,[
                //par defaault, il considere le champ comme etant requis. on met false, rien que pour pouvoir envoyer notre formulaire
               'required'=>false 
            ])
            ->add('tags', TextType::class)
               //'tags' fait ref a notre champ private de mon entity 'product'. C'est aussi le name du champ 'tags';pas sa value!!
               //on va utiliser un modeltransformer pour faire un implode/explode de notre collection de tags, en une chaine de caracteres
            //ces 2 lignes du dessous c est par cequ on ne peut pas ecrire: ->add('tags', TextType::class, $this->tagTransformer)
            ->get('tags')
                ->addModelTransformer($this->tagTransformer)
            ;       
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
//make:migration est ce qui cree le fichier "version"