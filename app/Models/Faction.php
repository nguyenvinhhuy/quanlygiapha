<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faction extends Model
{
    use HasFactory;
    use SoftDeletes; 
    
    protected $table='faction';
    protected $fillble=[
        'id',
        'name',
        'address',
        'tribe_id'
    ];
    public function persons()
    {
        return $this->hasMany(Person::class,'faction_id','id');
    }
    public function tribe()
    {
        return $this->belongsTo(Tribe::class,'tribe_id','id');
    }
}
