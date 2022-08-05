<?php
namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\EloquentRepository;

class UserEloquentRepository extends EloquentRepository 
{

    public function getModel()
    {
        return \App\Models\User::class;
    }
    public function getAll()
   {
       return User::all();
   }
}