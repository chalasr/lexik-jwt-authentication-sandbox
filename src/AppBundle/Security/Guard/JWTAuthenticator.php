<?php

namespace AppBundle\Security\Guard;

use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator as BaseAuthenticator;

class JWTAuthenticator extends BaseAuthenticator
{
    /**
     * Adds a new AuthorizationHeader token extractor for prefixing with "JWT" instead of "Bearer"
     *
     * {@inheritdoc}
     */
    protected function getTokenExtractor()
    {
        $chainExtractor = parent::getTokenExtractor();

        $chainExtractor->addExtractor(new AuthorizationHeaderTokenExtractor('JWT', 'Authorization'));

        return $chainExtractor;
    }
}
