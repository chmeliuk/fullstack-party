<?php

declare(strict_types=1);

namespace Chmeliuk\Bundle\TestioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 *
 * @package Chmeliuk\Bundle\TestioBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->redirectToRoute('chmeliuk_testio__list');
    }

    /**
     * @return Response
     */
    public function loginAction(): Response
    {
        if ($this->getUser()) {
            return $this->indexAction();
        }

        return $this->render('@ChmeliukTestio/Default/login.html.twig');
    }
}
