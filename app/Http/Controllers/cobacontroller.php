<?php

namespace App\Http\Controllers;
use App\models\friends;

use Illuminate\Http\Request;

class cobacontroller extends controller
{
    
public function index()
{
    $friends = friends::paginate(3);

    return view('index', compact('friends'));
}
public function create()
{
    return view('create');
}
public function store(Request $request )
{
    // validate the request...
    $friends = new friends;

    $friends->name = $request->nama; 
    $friends->no_tlp = $request->no_tlp; 
    $friends->alamat = $request->alamat;
    $friends->save();


    }
}