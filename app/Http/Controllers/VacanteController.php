<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   
    public function index()
    {
        
        // Autorizar por rol
        $this->authorize('viewAny',Vacante::class);

       return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Autorizar por rol
        $this->authorize('create',Vacante::class);
        return view('vacantes.create');
    }


    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes.show', [
            'vacante' => $vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante  $vacante)
    {

        // Proteger edit
        $this->authorize('update', $vacante);

        return view('vacantes.edit',[
            'vacante' => $vacante
        ]);
    }

    
}