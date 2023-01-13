<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class destinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinasi = Destinasi::all();
        return view('content.destinasi',[
            'destinasi' => $destinasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $pesan = [
            'required' => 'attribute wajib diisi',
            'mimes' => 'File harus berupa file jpg,png,jpeg',
        ];
        
        
        $this->validate($request, [

            'nama' => 'required',
            'alamat' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg',
        ], $pesan);


   
        $dokumen = $request->file('gambar');
        $nama_file = $dokumen->getClientOriginalName();
   
        $dokumen->move('images/', $nama_file);

        $eksekusi = Destinasi::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $nama_file,

        ]);
        if ($eksekusi == true) {
            return redirect('/destinasi')->with([
                'success' => 'Data Berhasil Ditambahkan',
            ]);
        } else {
            return redirect('/destinasi')->with([
                'error' => 'Data Gagal Ditambahkan',
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destinasi = Destinasi::select('*')->where('id', $id)->get();
        return view('content.detailDestinasi', [
            'destinasi' => $destinasi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destinasi = Destinasi::select('*')->where('id', $id)->get();
        return view('content.editDestinasi', [
            'destinasi' => $destinasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Destinasi::findOrFail($id);
        $file_path = public_path('images/' . $file->file_pdf);
        File::delete($file_path);
        $file->delete();

        return redirect('/destinasi')->with(['success' => 'Data Berhasil Di Hapus']);
    }
}
