<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\DetailTransaction;

class Stuff extends Model
{
    use HasFactory;

    protected $table = 'stuffs';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable   = [
        'id',
        'name',
        'price',
        'unit',
        'status',
        'image',
        'id_category',
    ];

    
    function category() {
        return $this->HasOne (Category::class, 'id', 'id_category');
    }
    
    function detail() {
        return $this->hasMany (DetailTransaction::class, 'id_stuff', 'id');
    }
    
}
