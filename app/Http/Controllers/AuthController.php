<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Repositories\User\UserEloquentRepository;

class AuthController extends Controller
{

    protected $userRepository;
    public function __construct(UserEloquentRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    // -----------------------------------------------------------------------
    public function register(Request $request){
        $user = User::create([
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'password' => bcrypt($request->get('password')),
          'role_id' => $request->get('role_id'),
        ]);

        return response()->json([
            'status'=> 200,
            'message'=> 'User created successfully',
            'data'=>$user
        ]);
    }
    // -----------------------------------------------------------------------
    public function login(Request $request){
        // $credentials = $request->only('email', bcrypt('password'));
        // $user = User::where('email', $credentials['email'])->first();
        // if (! $token = JWTAuth::fromUser($user)) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        $credentials = request(['email', 'password']);
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    // -----------------------------------------------------------------------
    public function me(){
        return response()->json(auth()->user());
    }
    // -----------------------------------------------------------------------
    public function logout(){
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    // -----------------------------------------------------------------------
    public function refresh(){
        return $this->respondWithToken(auth('api')->refresh());
    }
    // -----------------------------------------------------------------------
    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    public function index()
    {
        $users = $this->userRepository->getAll();
        return response()->json([
            'status'=> 200,
            'message'=> 'getAll User successfully',
            'data'=>$users
        ]);
    }
}
