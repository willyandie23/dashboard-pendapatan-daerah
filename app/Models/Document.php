<?php

namespace App\Models;

use App\Traits\ModelLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use ModelLog, HasFactory, SoftDeletes;
    
    protected $table = 'document';

    protected $fillable = [
        'document_name',
        'document_path',
        'total_download',
    ];

}
