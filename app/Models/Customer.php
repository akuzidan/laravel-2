<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable   = [
        'id',
        'name',
        'address',
        'status',
        'gender',
    ];

    function transaction() {
        return $this->hasMany (Transaction::class, 'id_customer', 'id');
    }
}
