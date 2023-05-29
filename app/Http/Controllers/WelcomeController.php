<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('test');
    }

    public function hello(string $n)
    {
        dd($n);
        return view('hello',['n'=> $n]); 
    }

    public function formtest(Request $request)
    {
        $this->validate($request, [
            'test' => 'required|min:3'
        ]);
        session()->flash('success','formulaire rempli avec succés');
        return view('form',['test'=> $request->input('test')]);
    }
}
