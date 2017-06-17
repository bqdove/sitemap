<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-06-17 16:03
 */
namespace Notadd\Sitemap\Events;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Notadd\Sitemap\Sitemap;

/**
 * Class SitemapRegister.
 */
class SitemapRegister
{
    /**
     * @var \Illuminate\Container\Container
     */
    protected $container;

    /**
     * @var \Illuminate\Events\Dispatcher
     */
    protected $dispatcher;

    /**
     * @var \Notadd\Sitemap\Sitemap
     */
    protected $sitemap;

    /**
     * SitemapRegister constructor.
     *
     * @param \Illuminate\Container\Container $container
     * @param \Illuminate\Events\Dispatcher   $dispatcher
     * @param \Notadd\Sitemap\Sitemap         $sitemap
     */
    public function __construct(Container $container, Dispatcher $dispatcher, Sitemap $sitemap)
    {
        $this->container = $container;
        $this->dispatcher = $dispatcher;
        $this->sitemap = $sitemap;
    }
}
