<?php

namespace AppBundle\Security;
use Symfony\Bridge\Twig\TwigEngine;

class Test
{
    public function __construct(\Swift_Mailer $mailer, TwigEngine $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }
}
