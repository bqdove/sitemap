<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-02-18 20:33
 */
namespace Notadd\Sitemap\Handlers;

use Illuminate\Container\Container;
use Notadd\Foundation\Routing\Abstracts\Handler;
use Notadd\Foundation\Setting\Contracts\SettingsRepository;

/**
 * Class SitemapHandler.
 */
class SetHandler extends Handler
{
    /**
     * @var \Notadd\Foundation\Setting\Contracts\SettingsRepository
     */
    protected $settings;

    /**
     * SetHandler constructor.
     *
     * @param \Illuminate\Container\Container                         $container
     * @param \Notadd\Foundation\Setting\Contracts\SettingsRepository $settings
     */
    public function __construct(Container $container, SettingsRepository $settings) {
        parent::__construct($container);
        $this->settings = $settings;
    }

    /**
     * Execute Handler.
     */
    public function execute()
    {
        $this->settings->set('sitemap.cycle', $this->request->input('cycle'));
        $this->settings->set('sitemap.enabled', $this->request->input('enabled'));
        $this->settings->set('sitemap.html', $this->request->input('html'));
        $this->settings->set('sitemap.recently', $this->request->input('recently'));
        $this->settings->set('sitemap.xml', $this->request->input('xml'));
        $this->withCode(200)->withMessage('修改设置成功！');
    }
}
