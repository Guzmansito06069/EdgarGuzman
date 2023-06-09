<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Correo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\codes;

use Illuminate\Support\Facades\Auth;

class Edgar extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url =  URL::temporarySignedRoute(
            'unsubscribe', now()->addMinutes(5), ['user' => 1]
        );
        //$correo = new Correo;
       
        Mail::to("alejandroguzman2322@gmail.com")->send(new Correo($url));
      
       return view('Verificacion');
    }

    public function verificar()
    {
       
        //$correo = new Correo;
       
        //Mail::to("alejandroguzman2322@gmail.com")->send(new Correo($url));
        $codigo_verf = rand(10000, 99999);
        $user = Auth::user();
        $registro = codes::find($user->id);
        $registro->codigo = $codigo_verf;
        $registro->save();
      
    }


    public function index2() {
        $users = User::all();
        return response()->json( $users);
       
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
