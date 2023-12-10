<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TokoController extends Controller
{
    public function index()
    {
        // mengambil data dari tabel dan mengurutkan secara desc
        $tokos = Toko::orderBy('created_at', 'DESC')->get();
        return view('index', compact('tokos'));  // compact artinya kita teruskan data dari tokos
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        // Periksa apakah ada nilai kosong di dalam $requestData
        if (in_array(null, $requestData, true)) {
            return redirect()->back()->with('failled', 'Please fill in all fields!');
        }

        // Jika tidak ada nilai kosong, lanjutkan untuk menyimpan data
        Toko::create($requestData);
        return redirect()->route('toko.index')->with('success', 'Yeay! item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $toko = Toko::findOrFail($id);   //mengambil data berdasarkan id
        return view('show', compact('toko'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $toko = Toko::findOrFail($id);
        return view('edit', compact('toko'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $toko = Toko::findOrFail($id);
    
    $requestData = $request->all();

    // Pemeriksaan setiap atribut (kolom) pada model Toko
    if (in_array(null, $requestData, true)) {
        return redirect()->back()->with('failed', 'Please fill in all fields!');
    }

    // Lakukan pembaruan jika tidak ada nilai yang null
    $toko->update($requestData);
    return redirect()->route('toko.index')->with('success', 'Yeay! item updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $toko = Toko::findOrFail($id);
        $toko->delete();
        return redirect()->route('toko.index')->with('success', 'Yeay! item deleted successfully!');
    }

    public function search(Request $request)
    {
        $jenis = $request->input('jenis'); // Ambil nilai yang diinputkan pengguna

        $tokos = Toko::where('jenis', $jenis)->get();
        return view('jenis', ['tokos' => $tokos]);
    }
}
