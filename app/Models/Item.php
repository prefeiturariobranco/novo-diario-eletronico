<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $table = 'items';
    protected $dates = ['disclosure', 'deleted_at', 'created_at'];
    protected $hidden = ['filetext'];
    protected $searchableColumns = ['filetext' => 100, 'disclosure' => 50, 'number' => 30];
}
