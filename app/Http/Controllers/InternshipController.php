<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Proposals;
use App\Models\Agencies;
use App\Models\Logbooks;

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

    public function logbookList($internship_id){
        
        $data = Logbooks::where('internship_id',$internship_id)->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil',
            'data' => $data
        ], 200);
    }

    public function logbookStore(Request $request, $internship_id){
        $logbook = new Logbooks();

        $logbook->internship_id = $internship_id;
        $logbook->date = $request->date;
        $logbook->activities = $request->activities;
        
        
        try {
            if($logbook->save())
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Menambah logbooks',
                'data' => $logbook
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function logbookUpdate(Request $request, $internship_id, $id){
        $logbook =  Logbooks::findOrFail($id);

        $logbook->date = $request->date;
        $logbook->activities = $request->activities;
        
        try {
            if($logbook->save())
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mengubah logbooks',
                'data' => $logbook
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function logbookDelete($internship_id, $id){
        $logbook =  Logbooks::findOrFail($id);

        $logbook->date = $request->date;
        $logbook->activities = $request->activities;
        
        try {
            if($logbook->delete())
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Menghapus',
                'data' => $logbook
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function logbookNote(Request $request, $logbook_id){
        $logbook =  Logbooks::findOrFail($logbook_id);

        $logbook->note = $request->note;
        try {
            if($logbook->save())
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menambah catatan',
                'data' => $logbook
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function NoteUpdate(Request $request, $logbook_id){
        $logbook =  Logbooks::findOrFail($logbook_id);

        $logbook->note = $request->note;
        try {
            if($logbook->save())
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menambah catatan',
                'data' => $logbook
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }


}
