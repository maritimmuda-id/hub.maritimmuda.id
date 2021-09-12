<?php

namespace App\Models;

use App\Models\Concerns\QueryCacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    use QueryCacheable;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'code',
    ];

    protected $casts = [
        'id' => 'integer',
    ];
}
