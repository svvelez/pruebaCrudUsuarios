@extends('layouts.app')

<div class="container">
    <div class="my-4">
        <h4 class="text-center">Listado de usuarios</h4>
    </div>
    <div class="row flex">
        <div class="col-6">
            <div class="my-4">
                <a class="btn btn-primary ml-2" href="{{route('usuarios.create')}}">Agregar</a>
                <a class="btn btn-primary my-2" href="{{route('menu')}}">Regresar</a>
            </div>
        </div>
    </div>
</div>

<div class="container bg-light">
    <table class="table bg-light flex">
        <thead>
            <tr>

                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Edad</th>
                <th scope="col">Sexo</th>
                <th scope="col">Direccion</th>
                <th scope="col">Fecha creación</th>
                <th scope="col">Ultima actualización</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usu)
            <tr>

                <td>{{$usu->nombre}} </td>
                <td>{{$usu->email}}</td>
                <td>{{$usu->edad}}</td>
                <td>{{$usu->sexo}}</td>
                <td>{{$usu->direccion}}</td>
                <td>{{$usu->created_at}}</td>
                <td>{{$usu->updated_at}}</td>
                <td>
                </td>
                <td class="p-3 flex justify-center">
                    <a href="{{ route('usuarios.edit',$usu->id) }}" class="text-black-400 hover:text-gray-100 mx-2">
                        <i class="fas fa-pen-to-square"></i>
                    </a>
                </td>



                <td class="p-3 flex justify-center">
                    <form action="{{ route('usuarios.destroy',$usu->id)}}" class="d-inline formulario-eliminar" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="fas fa-trash-can btn btn-danger"></button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>

</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
</script>

@if(session('eliminar')=='ok')
<script>
    Swal.fire(
        'Eliminado!',
        'Ha sido eliminado correctamente.',
        'success'
    )
</script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Eliminar',
            text: "¿Deseas eliminar este dato?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si,eliminarlo!'
        }).then((result) => {
            if (result.value) {
                /*Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )*/

                this.submit();
            }
        })
    });
</script>


</html>