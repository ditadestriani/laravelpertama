<?php

namespace App\Http\Controllers;
use App\models\friends;

use Illuminate\Http\Request;

class cobacontroller extends controller
{
    
public function index()
{
    $friends = friends::orderBy('id', 'desc') -> paginate(3);

    return view('friends.index', compact('friends'));
}
public function create()
{
    return view('friends.create');
}
public function store(Request $request)
{


    // validate the request...
    $request->validate([
        'nama' => 'required|unique:friends|max:255',
        'no_tlp' => 'required|numeric',
        'alamat' => 'required',

    ]);

    $friends = new friends;

    $friends->nama = $request->nama; 
    $friends->no_tlp = $request->no_tlp; 
    $friends->alamat = $request->alamat;
    $friends->save();

    return redirect('/');
    }
    public function show($id)
    {
        $friend = friends::where('id', $id)->first();
        return view('friends.show', ['friend' => $friend]);
    }
    public function edit($id)
    {
        $friend = friends::where('id', $id)->first();
        return view('friends.edit', ['friend' => $friend]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
        ]);

        friends::find($id)-> update([

            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat
        ]);

        return redirect('/');
    }
    public function destroy($id)
    {
        friends::find($id)->delete();
        return redirect('/');
    }


}
