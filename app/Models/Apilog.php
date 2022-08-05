<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apilog extends Model
{
    use HasFactory;
    protected $table='apilog';
    protected $fillable=[
        'id',
        'method',
        'url',
    ];
}
