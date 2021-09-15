<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sofa\Eloquence\Eloquence;

class Item extends Model
{
    use SoftDeletes;
    use Eloquence;

    protected $table = 'itens';
    protected $dates = ['disclosure', 'deleted_at', 'created_at'];
    protected $hidden = ['filetext'];
    protected $searchableColumns = ['filetext' => 100, 'disclosure' => 50, 'number' => 30];
}
