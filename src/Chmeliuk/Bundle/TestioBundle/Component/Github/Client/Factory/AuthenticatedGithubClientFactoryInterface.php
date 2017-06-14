<?php

declare(strict_types=1);

namespace Chmeliuk\Bundle\TestioBundle\Component\Github\Client\Factory;

use Github\Client;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Interface AuthenticatedGithubClientFactoryInterface
 *
 * @package Chmeliuk\Bundle\TestioBundle\Component\Github\Client\Factory
 */
interface AuthenticatedGithubClientFactoryInterface
{
    /**
     * @param Client $client
     * @param TokenStorageInterface $tokenStorage
     *
     * @return Client
     */
    public function create(Client $client, TokenStorageInterface $tokenStorage): Client;
}
