<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class AuteursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker=Faker\Factory::create('fr_FR');
        for ($i=1;$i<=20;$i++){
            $auteur = new Auteur();
            $auteur->setNomPrenom($faker->name);
            $auteur->setSexe(array_rand(array("M"=>"male","F"=>"female")));
            $auteur->setDateDeNaissance($faker->dateTimeBetween($startDate = '1900-01-01', $endDate = '2021-01-01', $timezone = null));
            $auteur->setNationalite($faker->countryCode);
            $manager->persist($auteur);
            $this->addReference('auteur_'.$i,$auteur);
        }
   

        $manager->flush();
    }
}