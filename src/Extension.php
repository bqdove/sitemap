<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-04-13 17:12
 */
namespace Notadd\Sitemap;

use Illuminate\Events\Dispatcher;
use Notadd\Foundation\Extension\Abstracts\Extension as AbstractExtension;
use Notadd\Foundation\Http\Events\RequestHandled;
use Notadd\Foundation\Setting\Contracts\SettingsRepository;
use Notadd\Sitemap\Events\SitemapRegister;
use Notadd\Sitemap\Listeners\CsrfTokenRegister;
use Notadd\Sitemap\Listeners\RouteRegister;

/**
 * Class Extension.
 */
class Extension extends AbstractExtension
{
    /**
     * Boot extension.
     */
    public function boot()
    {
        $this->app->make(Dispatcher::class)->listen(RequestHandled::class, function () {
            if ($this->app->isInstalled()) {
                $setting = $this->app->make(SettingsRepository::class);
                if ($setting->get('sitemap.enabled', false)) {
                    $sitemap = $this->app->make('sitemap');
                    $this->app->make(Dispatcher::class)->fire(new SitemapRegister($this->app, $this->app->make(Dispatcher::class), $sitemap));
                    $setting->get('sitemap.xml', true) && $sitemap->store('xml', 'sitemap');
                    $setting->get('sitemap.html', true) && $sitemap->store('html', 'sitemap');
                }
            }
        });
        $this->app->make(Dispatcher::class)->subscribe(CsrfTokenRegister::class);
        $this->app->make(Dispatcher::class)->subscribe(RouteRegister::class);
        $this->loadViewsFrom(realpath(__DIR__ . '/../resources/views'), 'sitemap');
        $this->publishes([
            realpath(__DIR__ . '/../resources/mixes/dist/assets/extensions/sitemap') => public_path('assets/extensions/sitemap'),
        ], 'public');
    }

    /**
     * Description of extension
     *
     * @return string
     */
    public static function description()
    {
        return '网站地图的生成和管理。';
    }

    /**
     * Installer for extension.
     *
     * @return \Closure
     */
    public static function install()
    {
        return function () {
            return true;
        };
    }

    /**
     * Name of extension.
     *
     * @return string
     */
    public static function name()
    {
        return '网站地图';
    }

    /**
     * Register extension extra providers.
     */
    public function register()
    {
        $this->app->singleton('sitemap', function () {
            return new Sitemap($this->app, [
                'use_cache'      => false,
                'cache_key'      => 'notadd_sitemap',
                'cache_duration' => 3600,
                'escaping'       => true,
            ]);
        });
    }

    /**
     * Get script of extension.
     *
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function script()
    {
        return asset('assets/extensions/sitemap/js/extension.min.js');
    }

    /**
     * Uninstall for extension.
     *
     * @return \Closure
     */
    public static function uninstall()
    {
        return function () {
            return true;
        };
    }

    /**
     * Version of extension.
     *
     * @return string
     */
    public static function version()
    {
        return '0.1.0';
    }
}
