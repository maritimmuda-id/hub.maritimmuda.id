<?php

namespace App\Models\Concerns;

trait QueryCacheable
{
    use \Rennokki\QueryCache\Traits\QueryCacheable;

    public $cacheDriver = 'file';

    public $cacheFor = 604800; // 1 week
}
