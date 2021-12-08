<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bahan.index', [
            'tittle' => 'Bahan',
            'active' => 'supplier',
            'bahans' => Bahan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bahan.create', [
            'tittle' => 'Bahan',
            'active' => 'supplier',
            'bahans' => Bahan::all(),
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
            'supplier' => 'required|max:25',
            'stok' => 'required',
            'satuan' => 'required',

            
        ]);

        Bahan::create($validatedData);
        $request->session()->flash('success', 'Berhasil menambah data!');
        return redirect('/bahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function show(Bahan $bahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('bahan.edit', [
            'tittle' => 'Bahan',
            'active' => 'supplier',
            'bahans' => Bahan::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bahan $bahan)
    {
        $rules = [
            'nama' => 'required|max:25',
            'supplier' => 'required|max:25',
            'stok' => 'required',
            'satuan' => 'required',
        ];


        $validatedData = $request->validate($rules);
        
        Bahan::where('id', $bahan->id)
                ->update($validatedData);        

        return redirect('/bahan')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahan $bahan)
    {
        //
    }
}
