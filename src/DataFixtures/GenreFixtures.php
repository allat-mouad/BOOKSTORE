<?php

namespace App\DataFixtures;


use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $genres = [
            1=>[
                "nom" => "animate"
            ],
            2=>[
                "nom" => "Science Fiction"
            ],
            3=>[
                "nom" => "Sport"
            ],
            4=>[
                "nom" => "drama"
            ],
            5=>[
                "nom" => "Documentary"
            ],
            6=>[
                "nom" => "comedy"
            ]
        ];

        foreach($genres as $key => $value){
            $genre = new Genre();
            $genre->setNom($value['nom']);
            $manager->persist($genre);
            $this->addReference('genre_'.$key,$genre);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}