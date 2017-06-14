<?php

declare(strict_types=1);

namespace Chmeliuk\Bundle\TestioBundle\Component\Github\Provider;

/**
 * Interface GithubIssueProviderInterface
 *
 * @package Chmeliuk\Bundle\TestioBundle\Component\Github\Provider
 */
interface GithubIssueProviderInterface
{
    /**
     * @param array $parameters
     * @param int $currentPage
     * @param int $perPage
     *
     * @return array
     */
    public function getList(array $parameters = [], int $currentPage = 1, int $perPage = 10): array;

    /**
     * @param string $owner
     * @param string $repository
     * @param int $id
     *
     * @return array
     */
    public function getOne(string $owner, string $repository, int $id): array;

    /**
     * @param string $owner
     * @param string $repository
     * @param int $id
     * @param int $currentPage
     * @param int $perPage
     *
     * @return array
     */
    public function getComments(
        string $owner,
        string $repository,
        int $id,
        int $currentPage = 1,
        int $perPage = 10
    ): array;
}
