<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('index', compact('usuarios'));
    }

    public function menu()
    {
        return view('menu');
    }

    public function login()
    {
        return view('login');
    }

    public function create()
    {
        $usuarios = Usuarios::all();
        return view('create', compact('usuarios'));
    }


    public function store(Request $request)
    {
        $usuarioValidate = new Usuarios();
        $errores = $usuarioValidate->validarDatos($request->all());
    
        if (!empty($errores)) {
            // Mostrar mensajes de error en SweetAlert
            return response()->json(['success' => false, 'errores' => $errores]);
        }
    
        try {
            $usuario = Usuarios::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'usuario' => hash::make(trim($request->usuario)),
                'email' => $request->email,
                'password' => hash::make(trim($request->password)),
                'edad' => $request->edad,
                'sexo' => $request->sexo,
                'direccion' => $request->direccion,
            ]);
    
            return response()->json(['success' => true, 'mensaje' => 'Usuario registrado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'mensaje' => 'Error al registrar el usuario']);
        }



    }


    public function show(string $id)
    {
        //return view('usuarios.show', compact('id'));
    }


    public function edit( $id)
    {
        $usuario = Usuarios::findOrFail($id);
        $usuarios = Usuarios::all();

        return view('edit', compact('usuario'));
    }


    public function update(Request $request,  $id)
    {
         $usuarioValidate = new Usuarios();
        $validator = validator()->make($request->all(), $usuarioValidate->rules, $usuarioValidate->messages);
 
        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'mensaje' => $validator->errors()->first()]);
        }


        $usuario = Usuarios::find($id);
        $usuario->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'password' => $request->password,
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'direccion' => $request->direccion,
        ]);

        return response()->json(['success' => 'true', 'mensaje' => 'usuario actualizado']);
    }


    public function destroy(string $id)
    {
        $usuario = Usuarios::findOrFail($id);

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('eliminar', 'ok');
    }
}
