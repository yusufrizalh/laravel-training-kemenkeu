<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $instansi = "Inixindo";
        // return view('home', ['nama' => request('nama')]);
        return view('home', compact('instansi'));
    }
}
