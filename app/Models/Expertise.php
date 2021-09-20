<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Expertise extends Model
{
    use HasFactory;
    use QueryCacheable;

    public $file = 'file';

    public $cacheFor = 604800; // 1 week

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'id' => 'integer',
    ];
}
