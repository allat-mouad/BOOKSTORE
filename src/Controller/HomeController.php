<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GenreRepository;
use App\Repository\LivreRepository;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(GenreRepository $genreRepo, LivreRepository $livreRepo,Request $req): Response
    {
        $livre = $livreRepo->getPaginatedLivres($req->query->get("pageLivre",1));

        return $this->render('home/index.html.twig', [
            'genres' => $genreRepo->findAll(),
            'livres' => $livre,
            'totalLivre' => $livreRepo->countLivres(),
            'controller_name' => 'HomeController',
        ]);
    }

  
}
