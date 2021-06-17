<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function store($id, Request $request){
        Aspirasi::create([
            "id_pelaporan" => $id,
            "feedback" => $request->feedback,
            "status" => "menunggu",
        ]);
        

        return redirect("aspirasi/view/$id")->with('success', 'Feedback berhasil dikirim');

    }

    public function store_admin($id, Request $request){
        Aspirasi::create([
            "id_pelaporan" => $id,
            "feedback" => $request->feedback,
            "status" => $request->status,
        ]);
        
 
        return redirect("/dashboard/input_aspirasi/view/$id")->with('success', 'Feedback berhasil dikirim');

    }

    public function delete($id){
        Aspirasi::destroy($id);
        return redirect(url()->previous())->with('success', 'Feedback berhasil dihapus');
        
        # Function url()->previous() :
        # Return Page sebelumnya ( kayak pencet tombol back ), "http://127.0.0.1:8000/dashboard/input_aspirasi/view/4"
    
    }

}
