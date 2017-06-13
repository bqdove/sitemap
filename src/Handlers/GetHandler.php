<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-03-18 15:24
 */
namespace Notadd\Sitemap\Handlers;

use Illuminate\Container\Container;
use Notadd\Foundation\Routing\Abstracts\Handler;
use Notadd\Foundation\Setting\Contracts\SettingsRepository;

/**
 * Class GetHandler.
 */
class GetHandler extends Handler
{
    /**
     * @var \Notadd\Foundation\Setting\Contracts\SettingsRepository
     */
    protected $settings;

    /**
     * GetHandler constructor.
     *
     * @param Container          $container
     * @param SettingsRepository $settings
     */
    public function __construct(Container $container, SettingsRepository $settings)
    {
        parent::__construct($container);
        $this->settings = $settings;
    }

    /**
     * Execute Handler.
     *
     * @throws \Exception
     */
    protected function execute()
    {
        $this->withCode(200)->withData([
            'cycle'    => $this->settings->get('sitemap.cycle', false),
            'enabled'  => $this->settings->get('sitemap.enabled', false),
            'html'     => $this->settings->get('sitemap.html', false),
            'recently' => $this->settings->get('sitemap.recently', false),
            'xml'      => $this->settings->get('sitemap.xml', false),
        ])->withMessage('获取网站地图配置成功！');
    }
}
