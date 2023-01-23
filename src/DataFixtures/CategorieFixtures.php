<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\User;
use App\Entity\Produit;
use App\Entity\Commande;
use App\Entity\Categorie;
use App\Entity\SeCompose;
use App\Entity\SousCategorie;
use App\Entity\DetailCommande;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CategorieFixtures extends Fixture 
{

    
    public function getDependencies()
    {
        return [
            CategorieFixtures::class,
        ];
    }
    private $hasher;

    public function __construct(UserPasswordHasherInterface $h) {
         $this->hasher = $h;
   }


    public function load(ObjectManager $manager ): void
    {
        // UTILISATEUR //
        $user1 = new User();
        $user1 ->setEmail("toto@gmail.com")
               ->setRoles(["ROLE_USER"])
                ->setPassword($this->hasher->hashPassword($user1 , "toto"))
                ->setNom("tatu")
                ->setPrenom("tatu")
                ->setSexe("H")
                ->setAdresse1("15 Rue des abricots")
                ->setAdresse2("20 rue des lila")
                ->setCodePostal("80000")
                ->setVille("Amiens")
                ->setTelephone("06.29.37.72.65")
                ->setImage("\img\global\logoProfil.jpg")
                ->setPays("France");
        $manager->persist($user1);

        $user2 = new User();
        $user2 ->setEmail("admin@gmail.com")
                ->setRoles(["ROLE_ADMIN"])
                ->setPassword($this->hasher->hashPassword($user2 , "admin"))
                ->setNom("administrator")
                ->setPrenom("admin")
                ->setSexe("F")
                ->setAdresse1("15 Rue des abricots")
                ->setAdresse2("20 rue des lila")
                ->setCodePostal("80000")
                ->setVille("Amiens")
                ->setTelephone("06.29.37.72.65")
                ->setImage("\img\global\logoProfil.jpg")
                ->setPays("France");
        $manager->persist($user2);

        $user3 = new User();
        $user3 ->setEmail("fournisseur@gmail.com")
               ->setRoles(["ROLE_FOURNISSEUR"])
                ->setPassword($this->hasher->hashPassword($user3 , "fournisseur"))
                ->setNom("fournisseur")
                ->setPrenom("fourni")
                ->setSexe("H")
                ->setAdresse1("15 Rue des abricots")
                ->setAdresse2("20 rue des lila")
                ->setCodePostal("80000")
                ->setVille("Amiens")
                ->setTelephone("06.29.37.72.65")
                ->setImage("\img\global\logoProfil.jpg")
                ->setPays("France");
        $manager->persist($user3);

        $user4 = new User();
        $user4 ->setEmail("superadmin@gmail.com")
                ->setRoles(["ROLE_SUPER_ADMIN"])
                ->setPassword($this->hasher->hashPassword($user4 , "superadmin"))
                ->setNom("superAdministateur")
                ->setPrenom("super admin")
                ->setSexe("H")
                ->setAdresse1("15 Rue des abricots")
                ->setAdresse2("20 rue des lila")
                ->setCodePostal("80000")
                ->setVille("Amiens")
                ->setTelephone("06.29.37.72.65")
                ->setImage("\img\global\logoProfil.jpg")
                ->setPays("France");
        $manager->persist($user4);

        // CATEGORIE //
        $categorieHomme1 = new Categorie();
        $categorieHomme1->setCategorieNom("Categorie homme")
            ->setCategorieType("Homme")
            ->setCategorieImg('\img\categorie\categorie_homme.jpeg');
        $manager->persist($categorieHomme1);

        $categorieFemme2 = new Categorie();
        $categorieFemme2->setCategorieNom("Categorie femme")
            ->setCategorieType("Femme")
            ->setCategorieImg('\img\categorie\categorie_femme.jpg');

        $manager->persist($categorieFemme2);

        $categorieEnfant3 = new Categorie();
        $categorieEnfant3->setCategorieNom("Categorie enfant")
            ->setCategorieType("Enfant")
            ->setCategorieImg('\img\categorie\categorie_enfant.jpg');

        $manager->persist($categorieEnfant3);



        $categorieAccessoire4 = new Categorie();
        $categorieAccessoire4->setCategorieNom("Categorie accessoire")
            ->setCategorieType("Accessoire")
            ->setCategorieImg('\img\categorie\categorie_accessoire.jpg');

        $manager->persist($categorieAccessoire4);

                 // SOUS CATEGORIE //

                $SousCategorieHomme1 = new SousCategorie();
                $SousCategorieHomme1->setSousCategorieNom("Sous Categorie homme")
                    ->setSousCategorieSexe("Homme")
                    ->setSousCategorieType("Sport")
                    ->setImg("/img/sousCat/SousCatSport.png");
                $SousCategorieHomme1->setCategorie($categorieHomme1);

                $manager->persist($SousCategorieHomme1);

                $SousCategorieHomme2 = new SousCategorie();
                $SousCategorieHomme2->setSousCategorieNom("Sous Categorie homme")
                    ->setSousCategorieSexe("Homme")
                    ->setSousCategorieType("Ville")
                    ->setImg("/img/sousCat/sousCatVille.jpg");
                $SousCategorieHomme2->setCategorie($categorieHomme1);

                $manager->persist($SousCategorieHomme2);

                $SousCategorieFemme1 = new SousCategorie();
                $SousCategorieFemme1->setSousCategorieNom("Sous Categorie Femme")
                    ->setSousCategorieSexe("Femme")
                    ->setSousCategorieType("Sport")
                    ->setImg("/img/sousCat/SousCatSport.png");
                $SousCategorieFemme1->setCategorie($categorieFemme2);

                $manager->persist($SousCategorieFemme1);

                $SousCategorieFemme2 = new SousCategorie();
                $SousCategorieFemme2->setSousCategorieNom("Sous Categorie Femme")
                    ->setSousCategorieSexe("Femme")
                    ->setSousCategorieType("Ville")
                    ->setImg("/img/sousCat/sousCatVille.jpg");
                $SousCategorieFemme2->setCategorie($categorieFemme2);

                $manager->persist($SousCategorieFemme2);

                $SousCategorieEnfant2 = new SousCategorie();
                $SousCategorieEnfant2->setSousCategorieNom("Sous Categorie Enfant")
                    ->setSousCategorieSexe("Enfant")
                    ->setSousCategorieType("Sport")
                    ->setImg("/img/sousCat/SousCatSport.png");
                    $SousCategorieEnfant2->setCategorie($categorieEnfant3);


                $manager->persist($SousCategorieEnfant2);

                $SousCategorieEnfant3 = new SousCategorie();
                $SousCategorieEnfant3->setSousCategorieNom("Sous Categorie Enfant")
                    ->setSousCategorieSexe("Enfant")
                    ->setSousCategorieType("Ville")
                    ->setImg("/img/sousCat/sousCatVille.jpg");
                    $SousCategorieEnfant3->setCategorie($categorieEnfant3);


                $manager->persist($SousCategorieEnfant3);


                $SousCategorieAccessoire1 = new SousCategorie();
                $SousCategorieAccessoire1->setSousCategorieNom("Sous Categorie Accessoire")
                     ->setSousCategorieSexe('Accessoire')
                    ->setSousCategorieType("Lacets")
                    ->setImg("/img/sousCat/sousCatVille.jpg");
                    $SousCategorieAccessoire1->setCategorie($categorieAccessoire4);
                    $manager->persist($SousCategorieAccessoire1);



                $SousCategorieAccessoire2 = new SousCategorie();
                $SousCategorieAccessoire2->setSousCategorieNom("Sous Categorie Accessoire")
                    ->setSousCategorieSexe('Accessoire')
                    ->setSousCategorieType("Cirage")
                    ->setImg("/img/sousCat/sousCatVille.jpg");
                            $SousCategorieAccessoire2->setCategorie($categorieAccessoire4);

                    $manager->persist($SousCategorieAccessoire2);


                $SousCategorieAccessoire3 = new SousCategorie();
                $SousCategorieAccessoire3->setSousCategorieNom("Sous Categorie Accessoire")
                    ->setSousCategorieSexe('Accessoire')
                    ->setSousCategorieType("Semelles")
                    ->setImg("/img/sousCat/sousCatVille.jpg");
                            $SousCategorieAccessoire3->setCategorie($categorieAccessoire4);
                            $manager->persist($SousCategorieAccessoire3);

                            // PRODUIT

                        $produit1 = new Produit();
                        $produit1->setSexeProduit("Homme")
                            ->setImgProduit('/img/homme/sneakerHomme.png')
                            ->setNomProduit("Sneakers Homme")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Sport")
                            ->setQteStock(125)
                            ->setTvaProduit(20)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit1->setSousCategorie($SousCategorieHomme1);
                        $manager->persist($produit1);

                        $produit2 = new Produit();
                        $produit2->setSexeProduit("Homme")
                            ->setImgProduit('/img/homme/costumeHomme.png')
                            ->setNomProduit("Chaussure de costume Homme")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Ville")
                            ->setQteStock(125)
                            ->setTvaProduit(20)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit2->setSousCategorie($SousCategorieHomme2);
                        $manager->persist($produit2);

                        $produit2 = new Produit();
                        $produit2->setSexeProduit("Homme")
                            ->setImgProduit('/img/homme/botteHomme.png')
                            ->setNomProduit("Chaussure de ville botte Homme")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Ville")
                            ->setQteStock(125)
                            ->setTvaProduit(20)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit2->setSousCategorie($SousCategorieHomme2);
                        $manager->persist($produit2);
                        
                                                $produit8 = new Produit();
                                                $produit8->setSexeProduit("Homme")
                                                    ->setImgProduit('/img/homme/runningHomme.png')
                                                    ->setNomProduit("Running pour Homme")
                                                    ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                                                    ->setTypeProduit("Sport")
                                                    ->setQteStock(125)
                                                    ->setTvaProduit(20)
                                                    ->setPrixProduit(30)
                                                    ->setCouleurProduit('Marron');
                                                $produit8->setSousCategorie($SousCategorieHomme1);
                                                $manager->persist($produit8);

                        $produit3 = new Produit();
                        $produit3->setSexeProduit("Femme")
                            ->setImgProduit('/img/femme/sneakerFemme.png')
                            ->setNomProduit("Sneakers Femme")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Sport")
                            ->setQteStock(125)
                            ->setTvaProduit(20)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit3->setSousCategorie($SousCategorieFemme1);
                        $manager->persist($produit3);

                        $produit4 = new Produit();
                        $produit4->setSexeProduit("Femme")
                            ->setImgProduit('/img/femme/botteFemme.png')
                            ->setNomProduit("Botte de ville pour Femme")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Ville")
                            ->setQteStock(125)
                            ->setTvaProduit(20)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit4->setSousCategorie($SousCategorieFemme2);
                        $manager->persist($produit4);

                        $produit8 = new Produit();
                        $produit8->setSexeProduit("Femme")
                            ->setImgProduit('/img/femme/runningFemme.png')
                            ->setNomProduit("Running")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Sport")
                            ->setQteStock(125)
                            ->setTvaProduit(20)
                            ->setPrixProduit(30)
                            ->setCouleurProduit('Bleu');
                        $produit8->setSousCategorie($SousCategorieFemme1);
                        $manager->persist($produit8);

                        $produit9 = new Produit();
                        $produit9->setSexeProduit("Femme")
                            ->setImgProduit('/img/femme/talonFemme.png')
                            ->setNomProduit("Running")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Sport")
                            ->setQteStock(125)
                            ->setTvaProduit(20)
                            ->setPrixProduit(30)
                            ->setCouleurProduit('Bleu');
                        $produit9->setSousCategorie($SousCategorieFemme2);
                        $manager->persist($produit9);

                        $produit5 = new Produit();
                        $produit5->setSexeProduit("Enfant")
                            ->setImgProduit('/img/enfant/sneakerEnfant.png')
                            ->setNomProduit("Sneakers Enfant")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Sport")
                            ->setQteStock(125)
                            ->setTvaProduit(20)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit5->setSousCategorie($SousCategorieEnfant3);
                        $manager->persist($produit5);

                        $produit5 = new Produit();
                        $produit5->setSexeProduit("Enfant")
                            ->setImgProduit('/img/enfant/sportEnfant.png')
                            ->setNomProduit("Sneakers Enfant")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Sport")
                            ->setQteStock(125)
                            ->setTvaProduit(20)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit5->setSousCategorie($SousCategorieEnfant3);
                        $manager->persist($produit5);


                        $produit6 = new Produit();
                        $produit6->setSexeProduit("Enfant")
                            ->setImgProduit('/img/enfant/bottineEnfant.png')
                            ->setNomProduit("Bottine Enfant")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Ville")
                            ->setQteStock(125)
                            ->setTvaProduit(20)
                            ->setPrixProduit(250)
                            ->setCouleurProduit('Gris');
                        $produit6->setSousCategorie($SousCategorieEnfant2);
                        $manager->persist($produit6);

                        $produit7 = new Produit();
                        $produit7->setSexeProduit("Enfant")
                            ->setImgProduit('/img/enfant/converseEnfant.png')
                            ->setNomProduit("Converse Enfant")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Ville")
                            ->setQteStock(125)
                            ->setPrixProduit(30)
                            ->setTvaProduit(20)
                            ->setCouleurProduit('Marron');
                        $produit7->setSousCategorie($SousCategorieEnfant2);
                        $manager->persist($produit7);



                        $produit7 = new Produit();
                        $produit7->setSexeProduit("Accessoire")
                            ->setImgProduit('/img/accessoire/lacet.png')
                            ->setNomProduit("Lacet")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Ville")
                            ->setQteStock(125)
                            ->setPrixProduit(30)
                            ->setTvaProduit(20)
                            ->setCouleurProduit('Marron');
                        $produit7->setSousCategorie($SousCategorieAccessoire1);
                        $manager->persist($produit7);

                        $produit7 = new Produit();
                        $produit7->setSexeProduit("Accessoire")
                            ->setImgProduit('/img/accessoire/cirage.png')
                            ->setNomProduit("cirage")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Ville")
                            ->setQteStock(125)
                            ->setPrixProduit(30)
                            ->setTvaProduit(20)
                            ->setCouleurProduit('Marron');
                        $produit7->setSousCategorie($SousCategorieAccessoire2);
                        $manager->persist($produit7);
                        
                        $produit7 = new Produit();
                        $produit7->setSexeProduit("Accessoire")
                            ->setImgProduit('/img/accessoire/chaussePied.png')
                            ->setNomProduit("chausse pied")
                            ->setDescriptionProduit('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dignissim massa, eu fringilla sem pellentesque sit amet. In hac habitasse platea dictumst. Nulla id ex ac sapien vehicula semper nec et nibh. Cras tristique tincidunt sem at porttitor. Pellentesque nec malesuada ante, quis volutpat elit. Aenean ac varius sapien, viverra volutpat eros. Etiam in ligula in erat viverra sodales. Sed vel odio sit amet felis sagittis tempor vitae quis ligula. Fusce non ex cursus, egestas lacus vel, varius odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt, magna sed finibus sollicitudin, tortor quam tristique lorem, sit amet facilisis nibh ligula eu purus. Fusce vestibulum varius pretium. Vivamus bibendum ullamcorper diam, quis ullamcorper libero pellentesque a. Morbi suscipit imperdiet velit sit amet volutpat. Integer tristique quis odio ut convallis.')
                            ->setTypeProduit("Ville")
                            ->setQteStock(125)
                            ->setPrixProduit(30)
                            ->setTvaProduit(20)
                            ->setCouleurProduit('Marron');
                        $produit7->setSousCategorie($SousCategorieAccessoire3);
                        $manager->persist($produit7);

                        // COMMANDE //   
                        
                        $com1 = new Commande();
                        $com1->setUser($user1);
                        $com1->setDateCommande(new DateTime());
                        $manager->persist($com1);
                
                        $sc1 = new SeCompose();
                        $sc1->setProduit($produit1);
                        $sc1->setCommande($com1);
                        $sc1->setQuantite(5);
                        $manager->persist($sc1);
                
                        $sc2 = new SeCompose();
                        $sc2->setProduit($produit2);
                        $sc2->setCommande($com1);
                        $sc2->setQuantite(2);
                        $manager->persist($sc2);
                


        $manager->flush();
    }
}
