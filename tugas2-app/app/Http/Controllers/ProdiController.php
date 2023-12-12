<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::all();
        return view("prodi.index")->with("prodi",$prodi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
         return view("prodi.create")->with("fakultas", $fakultas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create',Prodi::class);

        $validasi = $request->validate([
            "nama" => "required|unique:prodis",
            "fakultas_id" => "required"
        ]);

        Prodi::create($validasi);

        return redirect('prodi')->with("success","Data prodii berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $this->authorize('update',$prodi);
        $fakultas = Fakultas::all();
        // dd($fakultas);
        return view('prodi.edit')->with("fakultas",$fakultas)->with('prodi', $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $validasi = $request->validate([
            "nama" => "required",
            "fakultas_id" => "required"
        ]);

        $prodi->update($validasi);
        return redirect('prodi')->with("success","Data prodi berhasil diubah");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {

        $this->authorize('delete',$prodi);
        $prodi -> delete();
        return redirect()->route("prodi.index")->with("success","Berhasil Dihapus");
    }
}
