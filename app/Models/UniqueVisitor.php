<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UniqueVisitor extends Model
{
    protected $table = 'unique_visitors';

    protected $fillable = [
        'ip_address',
    ];

    public $timestamps = true;
}
