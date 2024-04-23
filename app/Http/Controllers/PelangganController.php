<?php

namespace App\Http\Controllers;

use App\Models\DataPelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DataPelanggan::all();
        return view('Pelanggan.index', ['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Pelanggan.create');
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

        $simpan = DataPelanggan::create($validasiData);

        return redirect('/Pelanggan')->with('success', 'Record created successfully');
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
        $data = DataPelanggan::findOrFail($id);
        return view('Pelanggan.edit', compact('data'));
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

        $data = DataPelanggan::findOrFail($id);

        // Update the record with the validated data
        $data->update($validasiData);

        // Redirect to a page or return a response
        return redirect('/Pelanggan')->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DataPelanggan::FindOrFail($id);
        $data->delete();
        return redirect('/Pelanggan')->with('success','Record Deleted Successfully');
    }
}
