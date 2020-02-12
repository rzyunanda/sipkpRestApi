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

    public function addGrade(Request $request, $id){
        $internship = Internship::findOrFail($id);

        $internship->grade = $request->grade;
        
        try {
            if($internship->save())
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Menambah Nilai',
                'data' => $internship
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function grade($id){
        $internship = Internship::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil',
            'data' => $internship
        ], 200);
    }

    public function advisors(Request $request, $id){
        $internship = Internship::findOrFail($id);

        $internship->advisor_id = $request->advisor_id;
        try {
            if($internship->save())
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Menambah Pembimbing',
                'data' => $internship
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }
    
}
