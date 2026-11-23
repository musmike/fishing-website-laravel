<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Fish extends Model
{
    use HasFactory;

    protected $table = 'fishes';

    protected $fillable = [
        'user_id',
        'location',
        'fish_species',
        'catch_weight',
        'catch_date',
        'photo_path',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
