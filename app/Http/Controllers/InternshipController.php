<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Proposals;
use App\Models\Agencies;

class InternshipController extends Controller
{
    public function getList(){
        $data = Internship::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    } 

    public function create(){
        $agencies = Agencies::all();

        return response()->json([
            'success' => true,
            'data' => $agencies
        ], 200);
    }

    public function store(Request $request){
        
        $proposal = new Proposals();
        $proposal->title = $request->title;
        $proposal->background = $request->background;
        $proposal->problem = $request->problem;
        $proposal->start_at = $request->start_at;
        $proposal->end_at = $request->end_at;
        $proposal->agencies_id = $request->agencies_id;
        $proposal->status ="Diajukan";
        $proposal->response_letter = $request->respornse_letter;
        $proposal->note = $request->note;

        if ($proposal->save()) {
            $internship = new Internship();
            $internship->proposal_id = $proposal->id;
            $internship->status = $request->status;
            $internship->advisor_id = $request->advisor_id;
            $internship->start_at = $request->start_at;
            $internship->end_at = $request->end_at;
            $internship->proposal = $proposal->title;
   
            if($internship->save()){
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => $internship
            ], 201);
        }
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

    public function delete($id)
    {
        $agencies = Agencies::findOrFail($id);
        try {
            if($agencies->delete())
                return response()->json([
                    'success' => true,
                    'message' => 'Data dihapus'
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }
}
