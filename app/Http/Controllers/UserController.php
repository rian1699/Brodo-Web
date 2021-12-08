<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', [
            'tittle' => 'User',
            'active' => 'supplier',
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create', [
            'tittle' => 'User',
            'active' => 'supplier',
            'users' => User::all(),
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
            'nama_dpn' => 'required|max:25',
            'nama_blkng' => 'required|max:25',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:25',

            
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        $request->session()->flash('success', 'Berhasil menambah data!');
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit', [
            'tittle' => 'User',
            'active' => 'supplier',
            'users' => User::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'nama_dpn' => 'required|max:25',
            'nama_blkng' => 'required|max:25',
            'email' => 'required',
            'password' => 'required',
        ];

        if($request->email != $user->email){
            $rules['email'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);
        
        User::where('id', $user->id)
                ->update($validatedData);        

        return redirect('/user')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
