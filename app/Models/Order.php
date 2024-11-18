<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    
    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'order_id', 'id'); // Relasi order ke satu pelanggan
    }
    public function listquest()
    {
        return $this->belongsTo(ListQuest::class, 'listquest_id', 'id'); // Relasi order ke satu listquest
    }
}
