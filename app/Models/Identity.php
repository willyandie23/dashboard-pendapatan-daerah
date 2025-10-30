<?php

namespace App\Models;

use App\Traits\ModelLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Identity extends Model
{
    use ModelLog, HasFactory, SoftDeletes;

    protected $table = 'identity';

    protected $fillable = [
        'key',
        'value',
    ];
}
