<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DataPegawai::all();
        return view('pegawai.index', ['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required'
            ]
        );

        $simpan = DataPegawai::create($validasiData);

        return redirect('/pegawai')->with('success', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DataPegawai::findOrFail($id);
        return view('pegawai.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required'
            ]
        );

        $data = DataPegawai::findOrFail($id);

        // Update the record with the validated data
        $data->update($validasiData);

        // Redirect to a page or return a response
        return redirect('/pegawai')->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DataPegawai::FindOrFail($id);
        $data->delete();
        return redirect('/pegawai')->with('success','Record Deleted Successfully');
    }
}
