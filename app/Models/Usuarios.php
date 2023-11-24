<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;



class Usuarios extends Model
{
    use HasFactory;

    public $table = "usuarios";

    public $rules = [


        'nombre' => 'required',
        'apellido' => 'required',
        'usuario' => 'required',
        'email' => 'required',
        'password' => 'required',
        'edad' => 'required',
        'sexo' => 'required',
        'direccion' => 'required',

    ];


    public $messages = [
        'nombre.required' => 'Ingrese nombre',
        'apellido.required' => 'Ingrese apellido',
        'usuario.required' => 'Ingrese usuario',
        'email.required' => 'Ingrese email',
        'password.required' => 'Ingrese password',
        'edad.required' => 'Ingrese edad',
        'sexo.required' => 'Seleccione sexo',
        'direccion.required' => 'Ingrese direccion',
    ];

    protected $fillable = [
        "nombre",
        "apellido",
        "usuario",
        "email",
        "password",
        "edad",
        "sexo",
        "direccion",
    ];

    public function validarDatos($datos)
    {
        $validator = Validator::make($datos, $this->rules, $this->messages);

        return $validator->errors()->toArray();
    }

}
