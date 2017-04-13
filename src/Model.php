<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-02-18 19:55
 */
namespace Notadd\Sitemap;

/**
 * Class Sitemap.
 */
class Model
{
    /**
     * @var array
     */
    public $items = [];

    /**
     * @var array
     */
    public $sitemaps = [];

    /**
     * @var null
     */
    private $title = null;

    /**
     * @var null
     */
    private $link = null;

    /**
     * @var bool
     */
    private $useCache = false;

    /**
     * @var string
     */
    private $cacheKey = 'notadd_sitemap';

    /**
     * @var int
     */
    private $cacheDuration = 3600;

    /**
     * @var bool
     */
    private $escaping = true;

    /**
     * Model constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->useCache = isset($config['use_cache']) ? $config['use_cache'] : $this->useCache;
        $this->cacheKey = isset($config['cache_key']) ? $config['cache_key'] : $this->cacheKey;
        $this->cacheDuration = isset($config['cache_duration']) ? $config['cache_duration'] : $this->cacheDuration;
        $this->escaping = isset($config['escaping']) ? $config['escaping'] : $this->escaping;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return array
     */
    public function getSitemaps()
    {
        return $this->sitemaps;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return bool|mixed
     */
    public function getUseCache()
    {
        return $this->useCache;
    }

    /**
     * @return mixed|string
     */
    public function getCacheKey()
    {
        return $this->cacheKey;
    }

    /**
     * @return int|mixed
     */
    public function getCacheDuration()
    {
        return $this->cacheDuration;
    }

    /**
     * @return bool|mixed
     */
    public function getEscaping()
    {
        return $this->escaping;
    }

    /**
     * @param $b
     */
    public function setEscaping($b)
    {
        $this->escaping = $b;
    }

    /**
     * @param $items
     */
    public function setItems($items)
    {
        $this->items[] = $items;
    }

    public function resetItems()
    {
        $this->items[] = array_slice($this->items[], 0, 50000);
    }

    /**
     * @param $sitemaps
     */
    public function setSitemaps($sitemaps)
    {
        $this->sitemaps[] = $sitemaps;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @param $useCache
     */
    public function setUseCache($useCache)
    {
        $this->useCache = $useCache;
    }

    /**
     * @param $cacheKey
     */
    public function setCacheKey($cacheKey)
    {
        $this->cacheKey = $cacheKey;
    }

    /**
     * @param $cacheDuration
     */
    public function setCacheDuration($cacheDuration)
    {
        $this->cacheDuration = $cacheDuration;
    }
}
