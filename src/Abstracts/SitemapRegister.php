<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-06-17 16:10
 */
namespace Notadd\Sitemap\Abstracts;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Notadd\Foundation\Event\Abstracts\EventSubscriber;
use Notadd\Sitemap\Events\SitemapRegister as SitemapRegisterEvent;
use Notadd\Sitemap\Sitemap;

/**
 * Class SitemapRegister.
 */
abstract class RouteRegister extends EventSubscriber
{
    /**
     * @var \Notadd\Sitemap\Sitemap
     */
    protected $sitemap;

    /**
     * RouteRegister constructor.
     *
     * @param \Illuminate\Container\Container $container
     * @param \Illuminate\Events\Dispatcher   $events
     * @param \Notadd\Sitemap\Sitemap         $sitemap
     */
    public function __construct(Container $container, Dispatcher $events, Sitemap $sitemap)
    {
        parent::__construct($container, $events);
        $this->sitemap = $sitemap;
    }

    /**
     * Name of event.
     *
     * @return mixed
     */
    protected function getEvent()
    {
        return SitemapRegisterEvent::class;
    }

    /**
     * Handle Route Register.
     */
    abstract public function handle();
}
