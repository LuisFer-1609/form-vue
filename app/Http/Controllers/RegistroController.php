<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Persona;
use Exception;

class RegistroController extends Controller
{
    function index()
    {
        return Inertia::render('Registro/Index');
    }

    function registro()
    {
        return Inertia::render('Registro/Registro');
    }

    function visualizacion()
    {
        return Inertia::render('Registro/Visualizacion', ['registros' => Persona::all()]);
    }

    function registrar(Request $request)
    {
        Persona::create($request->validate(
            [
                'nombres' => 'required|max:50',
                'apPaterno' => 'required|max:50',
                'apMaterno' => 'required|max:50'
            ],
            [
                'nombres.required' => 'El campo nombre es obligatorio',
                'nombres.max' => 'El nombre no debe exceder los 50 carácteres',
                'apPaterno.required' => 'El campo de apellido paterno es obligatorio',
                'apMaterno.required' => 'El campo de apellido materno es obligatorio',
                'apPaterno.max' => 'El campo de apellido paterno no debe pasar de los 50 carácteres',
                'apMaterno.max' => 'El campo de apellido materno no debe pasar de los 50 carácteres',

            ]

        ));

        return to_route('<registro>registro.visualizacion');
    }

    function eliminar(int $id)
    {
        Persona::destroy($id);

        return to_route('<registro>registro.visualizacion')->with('message', 'Usuario eliminado correctamente');
    }

    function editar(Request $request)
    {
        $idInput = base64_decode($request->input('idEditar'));

        $data = $request->validate(
            [
                'nombresEditar' => 'required|max:50',
                'apPaternoEditar' => 'required|max:50',
                'apMaternoEditar' => 'required|max:50'
            ],
            [
                'nombresEditar.required' => 'El campo nombre es obligatorio',
                'nombresEditar.max' => 'El nombre no debe exceder los 50 carácteres',
                'apPaternoEditar.required' => 'El campo de apellido paterno es obligatorio',
                'apMaternoEditar.required' => 'El campo de apellido materno es obligatorio',
                'apPaternoEditar.max' => 'El campo de apellido paterno no debe pasar de los 50 carácteres',
                'apMaternoEditar.max' => 'El campo de apellido materno no debe pasar de los 50 carácteres',

            ]
        );

        Persona::where('id', $idInput)->update([
            'nombres' => $data['nombresEditar'],
            'apPaterno' => $data['apPaternoEditar'],
            'apMaterno' => $data['apMaternoEditar'],
        ]);

        return to_route('<registro>registro.visualizacion')->with('message', 'Usuario editado correctamente');
    }

    function selectRegistro(int $id)
    {
        $select = Persona::find($id)->first();

        return $select->toJson();
    }
}
