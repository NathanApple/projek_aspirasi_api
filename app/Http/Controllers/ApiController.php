<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\InputAspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    public function show(){
        $aspirasi = InputAspirasi::all();
        return response($aspirasi, 200);
    }

    public function create(Request $request){
        InputAspirasi::create([
            "nik" => $request->nik,
            "id_kategori" => $request->kategori,
            "lokasi" => $request->lokasi,
            "keterangan" => $request->keterangan
        ]);
        return response("Berhasil Horee", 200);

    }

    public function update(Request $request){
        $input_aspirasi = InputAspirasi::find($request->id);

        $input_aspirasi->keterangan = $request->keterangan;
        $input_aspirasi->lokasi = $request->lokasi;

        $input_aspirasi->save();

        return response("Keterangan berhasil diupdate", 200);
    }

    public function delete(Request $request){
        InputAspirasi::destroy($request->id);
        return response("Berhasil dihapus", 200);
    }

    public function logout(Request $request){
        $this->validate($request, [
            'token' => 'required'
        ]);
        
        try {
            JWTAuth::invalidate($request->token);
            
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }
    


}
