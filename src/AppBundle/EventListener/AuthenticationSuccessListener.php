<?php

namespace AppBundle\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

class AuthenticationSuccessListener
{
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $event->setData([
            'code' => $event->getResponse()->getStatusCode(),
            'payload' => $event->getData(),
        ]);
    }
}
