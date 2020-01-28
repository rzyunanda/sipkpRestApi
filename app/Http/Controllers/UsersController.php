<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Students;
use App\Models\Staff;
use App\Models\Lectures;


class UsersController extends Controller
{
    public function getList(){
        $data = User::all();
        
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function getMhs(){
        $data = Students::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function getStaff(){
        $data = Staff::all();
        
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function getLecture(){
        $data = Lectures::all();
        
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    
}
