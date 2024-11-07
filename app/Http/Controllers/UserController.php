<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.index');
    }

    public function tentangKami()
    {
        return view('user.tentangKami');
    }

    public function laporan()
    {
        return view('user.laporan');
    }

    public function dataLaporan()
    {
        return view('user.dataLaporan');
    }

    public function kontak()
    {
        return view('user.kontak');
    }
}
