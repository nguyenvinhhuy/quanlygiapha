<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person_Description extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='person_description';
    protected $fillble=[
        'id',
        'description',
        'person_id',
    ];
    public function person()
    {
        return $this->belongsTo(Person::class,'person_id','id');
    }
}
