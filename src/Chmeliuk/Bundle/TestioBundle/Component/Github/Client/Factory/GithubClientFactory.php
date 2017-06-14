<?php

declare(strict_types=1);

namespace Chmeliuk\Bundle\TestioBundle\Component\Github\Client\Factory;

use Github\Client;
use Github\HttpClient\Builder;

/**
 * Class GithubClientFactory
 *
 * @package Chmeliuk\Bundle\TestioBundle\Component\Github\Client\Factory
 */
class GithubClientFactory implements GithubClientFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(
        Builder $httpClientBuilder = null,
        string $apiVersion = null,
        string $enterpriseUrl = null
    ): Client
    {
        return new Client($httpClientBuilder, $apiVersion, $enterpriseUrl);
    }
}
