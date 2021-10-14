<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{

    protected $fillable = [
        'file',
        'disclosure',
        'parse_pdf',
        'deleted_at',
        'created_at',
        'update_at',
        'number'
    ];

}
