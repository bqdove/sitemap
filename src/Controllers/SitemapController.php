<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-02-18 20:33
 */
namespace Notadd\Sitemap\Controllers;

use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\Sitemap\Handlers\GetHandler;
use Notadd\Sitemap\Handlers\SetHandler;

/**
 * Class SitemapController.
 */
class SitemapController extends Controller
{
    /**
     * Get handler.
     *
     * @param \Notadd\Sitemap\Handlers\GetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function get(GetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Set handler.
     *
     * @param \Notadd\Sitemap\Handlers\SetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function set(SetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
