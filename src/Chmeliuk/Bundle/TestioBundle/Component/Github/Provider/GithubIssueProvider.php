<?php

declare(strict_types=1);

namespace Chmeliuk\Bundle\TestioBundle\Component\Github\Provider;

use Github\Client;

/**
 * Class GithubIssueProvider
 *
 * @package Chmeliuk\Bundle\TestioBundle\Component\Github\Provider
 */
class GithubIssueProvider implements GithubIssueProviderInterface
{
    /** @var Client */
    private $client;

    /**
     * GithubIssueProvider constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(array $parameters = [], int $currentPage = 1, int $perPage = 4): array
    {
        $api = $this->client->currentUser();
        $api->setPerPage($perPage);

        $pager = $this->getResultPager();
        $result = $pager->fetch(
            $api,
            'issues',
            [
                array_merge(
                    $parameters,
                    [
                        'page' => $currentPage,
                    ]
                ),
                true,
            ]
        );

        return [
            'result' => $result,
            'pagination' => $this->createPaginationData($pager->getPagination()),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getOne(string $owner, string $repository, int $id): array
    {
        $issue = $this->client->issue()->show(
            $owner,
            $repository,
            $id
        );

        return $issue;
    }

    /**
     * {@inheritdoc}
     */
    public function getComments(
        string $owner,
        string $repository,
        int $id,
        int $currentPage = 1,
        int $perPage = 4
    ): array {
        $api = $this->client->issue()->comments();
        $api->setPerPage($perPage);

        $pager = $this->getResultPager();
        $comments = $pager->fetch(
            $api,
            'all',
            [
                $owner,
                $repository,
                $id,
                $currentPage,
            ]
        );

        return [
            'result' => $comments,
            'pagination' => $this->createPaginationData($pager->getPagination()),
        ];
    }

    /**
     * TODO: it's better to use some kind of factory and inject in via DI
     *
     * @return \Github\ResultPager
     */
    private function getResultPager(): \Github\ResultPager
    {
        return new \Github\ResultPager($this->client);
    }

    /**
     * @param array|null $pagination
     *
     * @return array
     */
    private function createPaginationData(?array $pagination): array
    {
        if (null === $pagination) {
            return [];
        }

        $data = [];
        foreach ($pagination as $key => $value) {
            $parsed = parse_url($value);
            parse_str($parsed['query'], $parameters);
            $data[$key] = [
                'parameters' => $parameters,
                'raw' => $value
            ];
        }

        return $data;
    }
}
