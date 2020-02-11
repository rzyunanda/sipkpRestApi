<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Proposals;
use App\Models\Agencies;
use Auth;


class ProposalsController extends Controller
{
    public function getList(){
        $data = Proposals::all();

        return response()->json([
            'success' => true,
            'message' => 'berhasil',
            'data' => $data
        ], 200);
    } 

    public function store(Request $request){
        $user_id = Auth::id();

        $proposal = new Proposals();
        
        $proposal->title = $request->title;
        $proposal->background = $request->background;
        $proposal->problem = $request->problem;
        $proposal->start_at = $request->start_at;
        $proposal->end_at = $request->end_at;
        $proposal->agencies_id = $request->agencies_id;
        $proposal->status ="diajukan";
        
        try {
            if ($proposal->save()) {
                $internship = new Internship();
                $internship->student_id = $user_id;
                $internship->proposal_id = $proposal->id;
                $internship->start_at = $proposal->start_at;
                $internship->end_at = $proposal->end_at;
                $internship->report_title = $proposal->title;
       
                if($internship->save()){
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil ditambahkan',
                    'data' => $internship
                ], 201);
            }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'data' => ''
            ], 400);
        }
    }

    public function detail($id){
        $data = Proposals::find($id);

        return response()->json([
            'success' => true,
            'message' => 'berhasil',
            'data' => $data
        ], 200);
    }
}
