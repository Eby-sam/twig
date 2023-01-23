<?php

namespace FDP\Controller;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;


class HomeController extends Controller
{
    public function home() {
        $this->render('home/home.html.twig', []);
    }
}