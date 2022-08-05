<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Repositories\Person\PersonInterface;

class PersonController extends Controller
{

    protected $personRepository;
    
    public function __construct(PersonInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function getperson()
    {
        $persons = $this->personRepository->getAll();
        return response()->json([
            'status'=> 200,
            'message'=> 'getAll Person successfully',
            'data'=>$persons
        ]);
    }
    // -----------------------------------------------------------------------
    public function addperson(Request $request)
    {
        $person = $this->personRepository->create($request); 
        return response()->json([
            'status' => 200,
            'message' => 'Person created successfully',
            'data' => $person
        ]);
    }
    // -----------------------------------------------------------------------
    public function editperson(Request $request)
    { 
        $person = $this->personRepository->update($request); 
        return response()->json([
            'status' => 200,
            'message' => 'Person updated successfully',
            'data' => $person
        ]);
        //done edit
    }
    // -----------------------------------------------------------------------
    public function deleteperson($id)
    {
        $person = Person::find($id);
        $person->softDeletes();
        return response()->json([
            'status' => 200,
            'message' => 'Person deleted successfully',
        ]);
    }
}
