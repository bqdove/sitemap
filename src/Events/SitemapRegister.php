<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-06-17 16:03
 */
namespace Notadd\Sitemap\Events;

use Notadd\Sitemap\Sitemap;

/**
 * Class SitemapRegister.
 */
class SitemapRegister
{
    /**
     * @var \Notadd\Sitemap\Sitemap
     */
    protected $sitemap;

    /**
     * SitemapRegister constructor.
     *
     * @param \Notadd\Sitemap\Sitemap $sitemap
     *
     * @internal param \Illuminate\Container\Container $container
     * @internal param \Illuminate\Events\Dispatcher $dispatcher
     */
    public function __construct(Sitemap $sitemap)
    {
        $this->sitemap = $sitemap;
    }
}
