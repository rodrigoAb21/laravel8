<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function index() {
        $trabajadores = Trabajador::all();
        return $trabajadores;
    }
    public function create(){
        return view('vistas.trabajadores.create', [
            'tipos' => Utils::$TIPOS_DE_USUARIO,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'carnet' => 'required|string|max:10',
            'telefono' => 'nullable|digits_between:7,8',
            'direccion' => 'nullable|max:255',
            'email' => 'required|max:255|email|unique:trabajador',
            'password' => 'nullable|string|max:255',
            'tipo' => 'required|max:255',
        ]);

        $trabajador = new Trabajador();
        $trabajador->nombre = $request['nombre'];
        $trabajador->apellido = $request['apellido'];
        $trabajador->carnet = $request['carnet'];
        $trabajador->telefono = $request['telefono'];
        $trabajador->direccion = $request['direccion'];
        $trabajador->email = $request['email'];
        $trabajador->password = bcrypt($request['carnet']);
        $trabajador->tipo = $request['tipo'];
        $trabajador->save();

        return redirect('trabajadores');
    }

    public function show($id)
    {
        return Trabajador::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'carnet' => 'required|string|max:10',
            'telefono' => 'nullable|digits_between:7,8',
            'direccion' => 'nullable|max:255',
            'email' => 'required|max:255|email',
            'password' => 'nullable|string|max:255',
            'tipo' => 'required|max:255',
        ]);

        $trabajador = Trabajador::findOrFail($id);
        $trabajador->nombre = $request['nombre'];
        $trabajador->apellido = $request['apellido'];
        $trabajador->carnet = $request['carnet'];
        $trabajador->telefono = $request['telefono'];
        $trabajador->direccion = $request['direccion'];
        $trabajador->email = $request['email'];
        if (trim($request['password']) != ''){
            $trabajador->password = bcrypt($request['password']);
        }
        $trabajador->tipo = $request['tipo'];
        $trabajador->update();

        return redirect('trabajadores');
    }

    public function destroy($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->delete();

        return redirect('trabajadores');
    }
}
