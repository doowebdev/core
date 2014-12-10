<?php namespace Doowebdev\Core\Cache;


use Desarrolla2\Cache\Cache;
use Desarrolla2\Cache\Adapter\File;


/**
 * Class DooCache
 * @package Doowebdev\Core\Cache
 */
trait DooCache {

    /**
     * @var int
     */
    private $duration = 3600;
   // private $cacheDir = __DIR__.'/../../../../../app/storage/cache';

    /**
     * @param $tag
     * @param $query
     * @return mixed
     * @throws \Desarrolla2\Cache\Exception\FileCacheException
     */
    public function cache( $tag, $query)
    {
        $adapter = new File( __DIR__.'/../../../../../../src/Storage/cache' );
        $adapter->setOption('ttl', $this->duration );
        $cache = new Cache( $adapter );

        $cache->set( $tag, $query , $this->duration );
        return $cache->get( $tag );
    }

} 