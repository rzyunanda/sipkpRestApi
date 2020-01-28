<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agencies;

class AgenciesController extends Controller
{
    public function getList(){
        $data = Agencies::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    } 

    public function store(Request $request){
        
        $agencies = new Agencies();
        $agencies->name = $request->name;
        $agencies->address = $request->address;
        
        if ($agencies->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => $agencies
            ], 201);
        }

    }   
    
    public function update(Request $request, $id){
        $agencies = Agencies::findOrFail($id);
        $agencies->name = $request->name;
        $agencies->address = $request->address;

        try {
            if($agencies->save())
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil diubah',
                    'data' => $agencies
                ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'data' => ''
            ], 400);
        }
    }

}
