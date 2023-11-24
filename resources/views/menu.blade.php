@extends('layouts.app')
<div class="container">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Menu</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('usuarios.create')}}">Crear</a></li>
                            <li><a class="dropdown-item" href="{{route('usuarios.index')}}">Listar</a></li>
                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Otras
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                            <li><a class="dropdown-item" href="#">Preguntas</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

</div>