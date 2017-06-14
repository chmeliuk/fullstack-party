<?php

declare(strict_types=1);

namespace Chmeliuk\Bundle\TestioBundle\Component\Github\Client\Factory;

use Github\Client;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class AuthenticatedGithubClientFactory
 *
 * @package Chmeliuk\Bundle\TestioBundle\Component\Github\Client\Factory
 */
class AuthenticatedGithubClientFactory implements AuthenticatedGithubClientFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(Client $client, TokenStorageInterface $tokenStorage): Client
    {
        $client->authenticate(
            $tokenStorage->getToken()->getAccessToken(),
            null,
            Client::AUTH_HTTP_TOKEN
        );

        return $client;
    }
}
