<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CascadaController extends Controller
{
    function index(Request $request)
    {
        return Inertia::render('Cascada/Index');
    }

    function crearCategoria(Request $request)
    {
        return response()->json($request->all());
    }
}
