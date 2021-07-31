<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'company_name', 'phone_number', 'email', 'street_address',
        'city', 'state', 'computers', 'laptops', 'monitors', 'crt',
        'other', 'servers', 'networking', 'harddrives', 'datatapes', 'mobile',
        'office', 'tablets', 'printers'
    ];

}
