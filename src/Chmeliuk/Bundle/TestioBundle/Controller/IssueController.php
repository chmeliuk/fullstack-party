<?php

declare(strict_types=1);

namespace Chmeliuk\Bundle\TestioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IssueController
 *
 * @package Chmeliuk\Bundle\TestioBundle\Controller
 */
class IssueController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function listAction(Request $request): Response
    {
        $parameters = [
            'filter' => $request->get('filter', 'all'),
            'state' => $request->get('state', 'open'),
            'sort' => $request->get('sort', 'created'),
            'direction' => $request->get('direction', 'desc'),
        ];

        if (null !== $labels = $request->get('labels')) {
            $parameters['labels'] = $labels;
        }

        if (null !== $since = $request->get('since')) {
            $parameters['since'] = $since;
        }

        $provider = $this->container->get('chmeliuk.testio.component.github.provider.issue');
        $collection = $provider->getList(
            $parameters,
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 4)
        );

        return $this->render(
            '@ChmeliukTestio/Issue/list.html.twig',
            [
                'collection' => $collection['result'],
                'pagination' => $collection['pagination'],
            ]
        );
    }

    /**
     * @param Request $request
     * @param string $owner
     * @param string $repository
     * @param int $id
     *
     * @return Response
     */
    public function oneAction(Request $request, string $owner, string $repository, int $id): Response
    {
        $provider = $this->container->get('chmeliuk.testio.component.github.provider.issue');
        $item = $provider->getOne($owner, $repository, $id);
        $comments = $provider->getComments(
            $owner,
            $repository,
            $id,
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 4)
        );

        return $this->render(
            '@ChmeliukTestio/Issue/show.html.twig',
            [
                'item' => $item,
                'comments' => $comments['result'],
                'pagination' => $comments['pagination'],
            ]
        );
    }

    /**
     * @param Request $request
     * @param string $owner
     * @param string $repository
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function commentsAction(Request $request, string $owner, string $repository, int $id): JsonResponse
    {
        $provider = $this->container->get('chmeliuk.testio.component.github.provider.issue');
        $collection = $provider->getComments(
            $owner,
            $repository,
            $id,
            (int) $request->get('page', 1),
            (int) $request->get('per_page', 4)
        );

        return new JsonResponse($collection);
    }
}
