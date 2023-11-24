@extends('layouts.app')

<div class="container">


    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-6 card my-4 bg-light p-3 border border-bg-primary">
                <h1 class="text-center my-4">
                    Login
                </h1>
                <form>
                    <div class="form-group my-4">
                        <label>Email</label>
                        <input type="email" class="form-control my-2" id="email" placeholder="Ingresa tu correo electrónico">
                    </div>
                    <div class="form-group my-4">
                        <label>Password</label>
                        <input type="password" class="form-control my-2" id="password" placeholder="Contraseña">
                    </div>
                    <a class="btn btn-primary my-2" href="{{route('menu')}}">Ingresar</a>
                </form>
            </div>
        </div>
    </div>

</div>