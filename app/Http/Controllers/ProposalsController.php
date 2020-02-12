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
        $data = Proposals::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'berhasil',
            'data' => $data
        ], 200);
    }

    public function update(Request $request, $id){
        
        $proposal = Proposals::findOrFail($id);
        $proposal->title = $request->title;
        $proposal->background = $request->background;
        $proposal->problem = $request->problem;
        $proposal->start_at = $request->start_at;
        $proposal->end_at = $request->end_at;
        $proposal->agencies_id = $request->agencies_id;
        $proposal->status ="diperbaiki";

        try {
            if ($proposal->save()) {
                $internship = Internship::where('proposal_id',$proposal->id)->first();
                $internship->start_at = $proposal->start_at;
                $internship->end_at = $proposal->end_at;
                
       
                if($internship->save()){
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil ubah',
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

    public function delete($id)
    {
        $internship = Internship::where('proposal_id',$id)->first();
        try {
            if($internship->delete())
                 $proposal = Proposals::find($id);
                 if($proposal->delete()){
                    return response()->json([
                        'success' => true,
                        'message' => 'Data dihapus'
                    ], 200);
                 }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }
    
    public function addTeam(Request $request, $id){
        $proposal = Proposals::findOrFail($id);
        
        $internship = new Internship();
        $internship->student_id = $request->student_id;
        $internship->proposal_id = $proposal->id;
        $internship->start_at = $proposal->start_at;
        $internship->end_at = $proposal->end_at;

        try {
            if($internship->save())
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Menambah teman',
                'data' => $internship
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 400);
        }

    }

    public function addNote(Request $request, $id){
        $proposal = Proposals::findOrFail($id);
        $proposal->note = $request->note;

        try {
            if($proposal->save())
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Menambah catatan',
                'data' => $proposal
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function accept($id){
        $proposal = Proposals::findOrFail($id);
        $proposal->status = "diterima";
       
        try {
            if($proposal->save())
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Menambah catatan',
                'data' => $proposal
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function decline(){
        $proposal = Proposals::findOrFail($id);
        $proposal->status = "ditolak";
       
        try {
            if($proposal->save())
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Menambah catatan',
                'data' => $proposal
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
