<?php

namespace App\Http\Controllers;

use App\Models\InputAspirasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InputAspirasiController extends Controller
{
    public function create(){

        $kategori = Kategori::all();

        // return dump($kategori);
        return view("user.input", compact("kategori"));
    }

    public function store(Request $request){
        
        // $nik = "P".$request->nik;
        InputAspirasi::create([
            "nik" => $request->nik,
            "id_kategori" => $request->kategori,
            "lokasi" => $request->lokasi,
            "keterangan" => $request->keterangan
    ]);

        return redirect("/")->with('success', 'input berhasil disimpan');
    }

    public function view($id){
        $input_aspirasi = InputAspirasi::find($id);
        $aspirasi = DB::table('aspirasis')
        ->where('id_pelaporan', $id)
        ->get();
        
        // $input_aspirasi = InputAspirasi::all();
        // return dump($input_aspirasi);
        return view('user.view', compact("input_aspirasi", "aspirasi"));
    }

    public function index(Request $request){
        
        $search = $request->search;

        

        $input_aspirasi = DB::table('input_aspirasis')
                ->where('nik', $search)
                # JOIN kategoris ON kategoris.id_kategoris   =   input_aspirasis.id_kategori
                ->join('kategoris', 'kategoris.id_kategori', '=', 'input_aspirasis.id_kategori')

                # Keterangan, lokasi, nik, etc >< created_at
                ->select(DB::raw('input_aspirasis.*, kategoris.*,input_aspirasis.created_at as tanggal_input')) 

                # Kalo pake ini input_aspirasis.created_at, maka yg kita dapet input_aspirasis
                ->get();

        // return dump($input_aspirasi);
        return view('user.index', compact('input_aspirasi'));
    }

    public function admin(){
        $input_aspirasi = InputAspirasi::all();

        return view("admin.input_aspirasi.view", compact('input_aspirasi'));
    }

    public function edit($id){
        $input_aspirasi = InputAspirasi::find($id);
        $aspirasi = DB::table('aspirasis')
        ->where('id_pelaporan', $id)
        ->get();

        return view('admin.input_aspirasi.edit', compact("input_aspirasi", "aspirasi"));
    }

    public function delete($id){
        InputAspirasi::destroy($id);
        return redirect("/dashboard/input_aspirasi")->with('success', 'Aspirasi berhasil dihapus');
        

    }

}
