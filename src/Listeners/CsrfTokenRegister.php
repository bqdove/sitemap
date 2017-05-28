<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-02-18 20:32
 */
namespace Notadd\Sitemap\Listeners;

use Notadd\Foundation\Event\Abstracts\EventSubscriber;
use Notadd\Foundation\Http\Events\CsrfTokenRegister as CsrfTokenRegisterEvent;

/**
 * Class CsrfTokenRegister.
 */
class CsrfTokenRegister extends EventSubscriber
{
    /**
     * Name of event.
     *
     * @throws \Exception
     * @return string|object
     */
    protected function getEvent()
    {
        return CsrfTokenRegisterEvent::class;
    }

    /**
     * Register excepts.
     *
     * @param $event
     */
    public function handle(CsrfTokenRegisterEvent $event)
    {
        $event->registerExcept('api/sitemap*');
    }
}
