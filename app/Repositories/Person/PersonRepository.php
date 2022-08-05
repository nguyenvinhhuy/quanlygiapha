<?php

namespace App\Repositories\Person;

use App\Models\Person;
use App\Repositories\EloquentRepository;
use App\Repositories\Person\PersonInterface;
use Illuminate\Http\Request;

class PersonRepository extends EloquentRepository implements PersonInterface
{

    public function getModel()
    {
        return \App\Models\Person::class;
    }
    public function getAll()
    {
        return Person::all();
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'job' => 'required',
            'ordinal' => 'required',
            'faction_id' => 'required',
        ]);
        return Person::create([
            'name' => $request->get('name'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            'dob' => $request->get('dob'),
            'deathday' => $request->get('deathday'),
            'father_id' => $request->get('father_id'),
            'mother_id' => $request->get('mother_id'),
            'wife_id' => $request->get('wife_id'),
            'job' => $request->get('job'),
            'ordinal' => $request->get('ordinal'),
            'faction_id' => $request->get('faction_id'),
        ]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $person = Person::find($request->input('id'));
        if (!$person) {
            return response()->json(['status' => '400', 'message' => 'Person not found !']);
        }
            // return $person->fill($request->input());
            return $person->update($request->input());
    }
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $person =  Person::find($request->input('id'));
        if (!$person) {
            dd('Thông báo lỗi');
        };
        $person->delete();
    }
}
