<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perrito;
use Illuminate\Validation\Rule;

class WelcomeController extends Controller
{
    public function index()
    {
        $perritos = Perrito::simplePaginate(5);

        return view('welcome', compact('perritos'));
    }

    public function store(Request $request)
    {   

        $request->validate([
            'nombre' => 'unique:perritos|required',
            'color' => 'required',
            'raza' => 'required',
        ]);

        Perrito::create([
            'nombre' => $request->nombre,
            'color' => $request->color,
            'raza' => $request->raza
        ]);

        return response()->json(['mensaje' => 'Ok']);
    }

    public function delete(Perrito $perrito)
    {
        $perrito->delete();

        return redirect()->route('index')->with('mensaje', 'El perrito se ha eliminado correctamente.');
    }

    public function update(Perrito $perrito)
    {
        return view('update', compact('perrito'));
    }

    public function saveUpdate(Perrito $perrito, Request $request){

        $request->validate([
            'nombre' => ['required', Rule::unique('perritos')->ignore($perrito->id)],
            'color' => 'required',
            'raza' => 'required',
        ]);

        $perrito->nombre = $request->nombre;
        $perrito->color = $request->color;
        $perrito->raza = $request->raza;

        $perrito->save();

        return response()->json(['mensaje' => 'Ok']);
    }
}
