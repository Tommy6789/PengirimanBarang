<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use App\Models\DataPelanggan;
use App\Models\DataPengiriman;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DataPengiriman::with('pegawai', 'pelanggan')->get();
        $pegawai = DataPegawai::all();
        $pelanggan = DataPelanggan::all();
        return view('pengiriman.index', ['data' => $data, 'pegawai' => $pegawai, 'pelanggan' => $pelanggan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validate = $request->validate([
        'id_pegawai' => 'required',
        'id_pelanggan' => 'required',
        'tanggal_dikirim' => 'required',
        'photo_penyerahan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'harga' => 'required',
        'status' => 'required'
    ]);
    
    $imageName = time().'.'.$request->photo_penyerahan->extension();  
    $request->photo_penyerahan->storeAs('public', $imageName);
    $validate['photo_penyerahan'] = $imageName;
    
    DataPengiriman::create($validate);

    return redirect('/pengiriman')
        ->with('success', 'Berhasil Melakukan Pengiriman');
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
    public function edit($id)
    {
        $data = DataPengiriman::findOrFail($id);
        $pegawai = DataPegawai::all();
        $pelanggan = DataPelanggan::all();
        return view('pengiriman.edit', compact('data', 'pegawai', 'pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the DataPengiriman record by its ID
        $data = DataPengiriman::findOrFail($id);

        // Validate the incoming request data
        $validate = $request->validate([
            'id_pegawai' => 'required',
            'id_pelanggan' => 'required',
            'tanggal_dikirim' => 'required',
            'Photo_penyerahan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga' => 'required',
            'status' => 'required'
        ]);

        $data = DataPengiriman::findOrFail($id);
        if ($data->photo) {
            Storage::disk('public')->delete($data->photo);
        }
        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->storeAs('public', $imageName);
        $validate['photo'] = $imageName;
        $data->update($validate);
        return redirect('pengiriman')->with('success', 'Data Pengiriman berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the DataPengiriman record by its ID
        $data = DataPengiriman::findOrFail($id);
        // Delete the record
        if ($data->photo_penyerahan) {
            Storage::disk('public')->delete($data->photo_penyerahan);
        }
        $data->delete();
        // Redirect back with success message
        return redirect('pengiriman')->with('success', 'Data Pengiriman berhasil dihapus');
    }
}
