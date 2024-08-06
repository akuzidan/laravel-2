<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
use App\Models\Stuff;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $table = 'detail_transactions';

    protected $primaryKey = 'id';

    protected $keyType = 'integer';

    protected $fillable   = [
        'id',
        'nota',
        'id_stuff',
        'count',
        'price',
        'discount',
    ];

    function category() {
        return $this->HasOne (Category::class, 'id', 'id_stuff');
    }
    
    function transaction() {
        return $this->hasMany (Transaction::class, 'nota', 'nota');
    }
}
