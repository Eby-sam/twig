<?php

namespace FDP\Controller;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;


class HomeController extends Controller
{

    public function home() {
        $this->render('home/home.html.twig', [
            'user' => 'bite',
            'hobbies' => ['bite', 'couille', 'chneck'],
            'sexe' => ['oui', 'jai dit oui','ta interer'],
            'montant' => 89789876.5443
        ]);
    }
}