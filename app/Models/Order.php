<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'selectedProducts',
        'paymentMethod',
        'city',
        'postal_code',
        'age',
        'street',
        'houseNumber',
    ];
    use HasFactory;
}
