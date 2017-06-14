<?php

declare(strict_types=1);

namespace Chmeliuk\Bundle\TestioBundle\Component\Github\Client\Factory;

use Github\Client;
use Github\HttpClient\Builder;

/**
 * Interface GithubClientFactoryInterface
 *
 * @package Chmeliuk\Bundle\TestioBundle\Component\Github\Client\Factory
 */
interface GithubClientFactoryInterface
{
    /**
     * @param Builder|null $httpClientBuilder
     * @param string|null $apiVersion
     * @param string|null $enterpriseUrl
     *
     * @return Client
     */
    public function create(
        Builder $httpClientBuilder = null,
        string $apiVersion = null,
        string $enterpriseUrl = null
    ): Client;
}
