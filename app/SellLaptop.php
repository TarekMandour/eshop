<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellLaptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'email', 'address', 'ram_size', 'brand',
        'processors', 'age_laptop', 'operating_system', 'condition_laptop', 'modal_name', 'hard_drive',
        'photo'
    ];
}
