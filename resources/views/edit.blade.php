@extends('layouts.app')

<div class="container">
    <div class="my-4">
        <h4>Editar usuario {{$usuario->nombre. " ". $usuario->apellido}}</h4>
    </div>
    <div class="container bg-light">
        <form action="{{ route('usuarios.update',$usuario->id) }}" id="formularioUpdate" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="col-form-label">Nombres:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->nombre }}">
                </div>
                <div class="col-6 mb-3">
                    <label class="col-form-label">apellidos:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $usuario->apellido }}">
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-3">
                    <label class="col-form-label">usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $usuario->usuario }}">
                </div>
                <div class="col-6 mb-3">
                    <label class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $usuario->email }}">
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-3">
                    <label class="col-form-label">Password:</label>
                    <input type="text" class="form-control" id="password" name="password" value="{{ $usuario->password }}">
                </div>
                <div class="col-6 mb-3">
                    <label class="col-form-label">Edad:</label>
                    <input type="text" class="form-control" id="edad" name="edad" value="{{ $usuario->edad }}">
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-3">
                    <label class="col-form-label">Sexo:</label>
                    <input type="text" class="form-control" id="sexo" name="sexo" value="{{ $usuario->sexo }}">
                </div>
                <div class="col-6 mb-3">
                    <label class="col-form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $usuario->direccion }}">
                </div>
            </div>

            <button type="submit" id="enviarUpdate" class="my-4 w-full btn btn-primary p-2 font-semibold rounded text-white hover:bg-600 ">
                Guardar
            </button>

        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $("#enviarUpdate").click(function() {
            var form = $("#formularioUpdate").serialize();
            var usuarioId = "{{ $usuario->id }}";

            $.ajax({
                url: '/usuarios/' + usuarioId + 'edit',
                data: form,
                type: 'PUT',
                dataType: 'json',
                success: function(data) {
                    if (data.success == 'true') {
                        
                        Swal.fire(" ¡Usuario Actualizado! ",  data.mensaje , "success").then(() => {
                            window.location.href = "{{ route('usuarios.index') }}"
                        });

                    } else {
                        Swal.fire(" Usuario no registrado! " + data.mensaje,
                            "Complete toda la información y valide los datos", "error");
                    } 
                },
                error: function(error) {
                    console.log(error.responseJSON.message);
                    alert('Error al actualizar el usuario');
                },
            });
        });
    });
</script>