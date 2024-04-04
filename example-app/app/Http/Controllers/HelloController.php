<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(): View
    {
        $authors = [
            1=>'John Doe', 
            2=>'Alpha', 
            3=>'Elo'
        ];
        // return view('accueil', ['name'=> 'john Doe']);
        return view('accueil')->with(['name'=> 'john Doe',
                                        'age'=> 15,
                                    'nombre'=>10,
                                    'authors' => $authors]);

    }
    public function about(): View
    {
        return view('about');
    }
}
