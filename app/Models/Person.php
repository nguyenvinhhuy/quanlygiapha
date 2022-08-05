<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model 
{
    use HasFactory;
    use SoftDeletes;
    protected $table='person';
    protected $fillable=[
        'name',
        'gender',
        'address',
        'dob',
        'deathday',
        'father_id',
        'mother_id',
        'wife_id',
        'job',
        'ordinal',
        'faction_id',
    ];
    public function person_descriptions()
    {
        return $this->hasMany(Person_Description::class,'person_id','id');
    }
    public function faction()
    {
        return $this->belongsTo(Faction::class,'faction_id','id');
    }
}
