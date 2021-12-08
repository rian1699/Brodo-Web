<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produk.index', [
            'tittle' => 'Produk',
            'active' => 'supplier',
            'produks' => Produk::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create', [
            'tittle' => 'Produk',
            'active' => 'supplier',
            'produks' => Produk::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:25',
            'stok' => 'required',

            
        ]);

        Produk::create($validatedData);
        $request->session()->flash('success', 'Berhasil menambah data!');
        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('produk.edit', [
            'tittle' => 'Produk',
            'active' => 'supplier',
            'produks' => Produk::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'nama' => 'required|max:25',
            'stok' => 'required',
        ];


        $validatedData = $request->validate($rules);
        
        Produk::where('id', $produk->id)
                ->update($validatedData);        

        return redirect('/produk')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
