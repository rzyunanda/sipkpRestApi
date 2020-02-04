<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposals;

class ProposalsController extends Controller
{
    public function getList(){
        $data = Proposals::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    } 
}
