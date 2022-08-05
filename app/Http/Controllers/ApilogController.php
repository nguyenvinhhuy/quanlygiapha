<?php

namespace App\Http\Controllers;

use App\Models\Apilog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApilogController extends Controller
{
    public function addapilog(Request $request){
        $apilog = Apilog::create([
          'method' => $request->getMethod(),
          'url' => $request->getUri(),
        //   'created_at' => Carbon::now(),
        ]);
        return response()->json([
            'status'=> 200,
            'message'=> 'Apilog created successfully',
            'data'=>$apilog
        ]);
    }
}
