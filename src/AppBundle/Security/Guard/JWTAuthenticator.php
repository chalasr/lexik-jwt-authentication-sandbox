<?php

namespace AppBundle\Security\Guard;

use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\TokenExtractorInterface;
use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator as BaseAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class JWTAuthenticator extends BaseAuthenticator
{
    /**
     * {@inheritdoc}
     */
    protected function getTokenExtractor()
    {
        $chainExtractor = parent::getTokenExtractor();

        $chainExtractor->removeExtractor(function (TokenExtractorInterface $ext) {
            return $ext instanceof AuthorizationHeaderTokenExtractor;
        });

        $chainExtractor->addExtractor(new AuthorizationHeaderTokenExtractor('JWT', 'Authorization'));

        return $chainExtractor;
    }
}
