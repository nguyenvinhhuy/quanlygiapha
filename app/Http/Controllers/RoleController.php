<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleEloquentRepository;
use App\Repositories\Role\RoleInterface;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    // -----------------------------------------------------------------
    public function index()
    {
        $roles = $this->roleRepository->getAll();
        return response()->json([
            'status'=> 200,
            'message'=> 'getAll Role successfully',
            'data'=>$roles
        ]);

    }
    // -----------------------------------------------------------------
    public function addrole(Request $request)
    {
        $role = $this->roleRepository->create($request); 
        return response()->json([
            'status' => 200,
            'message' => 'Role created successfully',
            'data' => $role
        ]);
    }
    // -----------------------------------------------------------------
    public function editrole(Request $request)
    {
        $role = $this->roleRepository->update($request); 
        return response()->json([
            'status' => 200,
            'message' => 'Role updated successfully',
            'data' => $role
        ]);

    }
    // -----------------------------------------------------------------
    public function destroy(Request $request)
    {
        $this->roleRepository->delete($request);
        return response()->json([
            'status'=> 200,
            'message'=> 'Role deleted successfully',
        ]);
    }
}
