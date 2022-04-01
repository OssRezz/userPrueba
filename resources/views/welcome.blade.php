@extends('layouts.layout')
@section('title', 'Login')
@section('content')
    <div class="container-fluid py-5 my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header"><b>Formulario de inicio de sesion</b></div>
                    <div class="card-body">
                        <form action="login" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="email" name="correo" placeholder="Correo electronico" class="form-control">
                                <label for="">Correo electronico</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" placeholder="Contraseña" class="form-control">
                                <label for="">Contraseña</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-outline-primary">Iniciar sesion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
