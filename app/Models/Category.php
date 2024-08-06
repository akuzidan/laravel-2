<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stuff;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable   = [
        'id',
        'name',
        'status',
    ];

    public function stuff(){
        return $hasMany(Stuff::class, 'id_stuff', 'id');
    }
}
