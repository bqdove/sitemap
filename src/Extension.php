<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-13 17:12
 */
namespace Notadd\Sitemap;

use Notadd\Foundation\Extension\Abstracts\Extension as AbstractExtension;

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
        $this->loadViewsFrom(realpath(__DIR__ . '/../resources/views'), 'sitemap');
    }

    /**
     * Description of extension
     *
     * @return string
     */
    public static function description()
    {
        return 'Extension for sitemap.';
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
        return 'notadd/sitemap';
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
