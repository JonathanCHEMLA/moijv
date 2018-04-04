<?php
// c est pour le formulaire des produits
namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
//pas de pb que textarea soit declare ci dessous et a la ligne 19.
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description',TextareaType::class)
                //FileType est le bouton sur lequel le user clique pour choisir l'image
            ->add('image', FileType::class,[
                //par defaault, il considere le champ comme etant requis. on met false, rien que pour pouvoir envoyer notre formulaire
               'required'=>false 
            ]);
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