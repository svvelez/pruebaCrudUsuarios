@extends('layouts.app')

<div class="container">
    <div class="my-4">
        <h4>Registrar usuario</h4>
    </div>

    <div class="container bg-light">
        <form action="{{route('usuarios.store')}}" id="formularioCreate" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="row">
                <div class="col-6 mb-3">
                    <label class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="col-6 mb-3">
                    <label class="col-form-label">apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido">
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-3">
                    <label class="col-form-label">usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario">
                </div>
                <div class="col-6 mb-3">
                    <label class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-3">
                    <label class="col-form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col-6 mb-3">
                    <label class="col-form-label">Edad:</label>
                    <input type="text" class="form-control" id="edad" name="edad">
                </div>
            </div>


            <div class="row">
                <div class="col-6 mb-3">
                    <label class="col-form-label">Sexo:</label>
                    <input type="text" class="form-control" id="sexo" name="sexo">
                </div>
                <div class="col-6 mb-3">
                    <label class="col-form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion">
                </div>
            </div>


           
            <div class="my-4">
            <button type="submit" id="enviar" class="my-3 w-full btn btn-info p-2 font-semibold rounded text-black hover:bg-600 ">
                Guardar
            </button>
                <button class="btn btn-primary"><a class="btn btn-primary" href="{{route('menu')}}">Regresar</a></button>
            </div>

        </form>
    </div>

</div>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#formularioCreate").submit(function(e) {
            e.preventDefault();

            var formulario = new FormData(this);


            $.ajax({
                type: 'POST',
                url: "{{ url('usuarios') }}",
                data: formulario,
                cache: false,
                contentType: false,
                processData: false,

                success: function(data) {
                    if (data.success) {
                        Swal.fire("¡Usuario Registrado!", data.mensaje, "success").then(() => {
                            window.location.href = "{{ route('usuarios.index') }}";
                        });
                    } else {
                        // Mostrar mensajes de error de validación en SweetAlert
                        let errores = Object.values(data.errores).join('<br>');
                        Swal.fire("¡Error al Registrar Usuario!", errores, "error");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", status, error);
                    Swal.fire("¡Error en la Solicitud AJAX!", "Hubo un problema al procesar la solicitud", "error");
                }
            });
        });

    });
</script>