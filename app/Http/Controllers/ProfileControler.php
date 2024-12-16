<?php

namespace App\Http\Controllers;
use App\Models\Profile;

use Illuminate\Http\Request;

class ProfileControler extends Controller
{
    public function tampil(){
        $profilData = Profile::all();
        
        return view('welcome', compact('profilData'));
        
    }
}
