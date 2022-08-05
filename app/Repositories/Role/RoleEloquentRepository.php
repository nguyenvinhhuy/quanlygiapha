<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\EloquentRepository;
use App\Repositories\Role\RoleInterface;
use Illuminate\Http\Request;

class RoleEloquentRepository extends EloquentRepository implements RoleInterface
{

    public function getModel()
    {
        return \App\Models\Role::class;
    }
    public function getAll()
    {
        return Role::all();
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        return Role::create([
            'name' => $request->get('name'),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $role = Role::find($request->input('id'));
        if (!$role) {
            return response()->json(['status' => '400', 'message' => 'Role not found !']);
        }
            return $role->fill($request->input())->update();
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $role =  Role::find($request->input('id'));
        if (!$role) {
            dd('Thông báo lỗi');
        };
        $role->delete();
    }
}
