<?php

namespace  FDP\Controller;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\CoreExtension;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

abstract class Controller {

    private static ?Environment $twigInstance = null;
    private static ?filesystemLoader $twigLoader = null;

    public function render(...$param): void
    {
        try {
            echo self::getTwig()->render(...$param);
        }

        catch (LoaderError $e) {
            echo self::getTwig()->render('error/404.html.twig');
        }

        catch (RuntimeError|SyntaxError $e) {
            echo self::getTwig()->render('error/500.html.twig');
        }
    }

    /**
     * return Twig Instance.
     * @return Environment|null
     */
    public function getTwig() {

        if(null === self::$twigInstance) {
            self::$twigLoader = new FilesystemLoader('../templates');
            self::$twigInstance = new Environment(self::$twigLoader, [
                'debug' => true,
                'strict_variables' => true,
                'cache' => '../var/cache',
            ]);

            self::$twigInstance->addExtension(new DebugExtension());
            self::$twigInstance->getExtension(CoreExtension::class)->setNumberFormat(2, ', ', ' ');
        }

        return self::$twigInstance;

    }

    /**
     * Return the current twig Loader.
     */
    public function getTwigLoader(): ?FilesystemLoader
    {
        return self::$twigLoader;
    }

}