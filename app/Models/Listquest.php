<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listquest extends Model
{
    use HasFactory;
    protected $table = 'listquest';

    public function order()
    {
        return $this->hasOne(Order::class, 'listquest_id', 'id'); // Relasi satu listquest ke satu order
    }

}
