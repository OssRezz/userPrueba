@extends('layouts.layout')
@section('title', 'Usuarios')
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">Formulario de inicio de sesion</div>
                    <div class="card-body">
                        <div class="g-2">
                            <form action="">
                                <div class="form-floating">
                                    <input type="email" name="correo" placeholder="Correo electronico"
                                        class="form-control">
                                    <label for="">Correo electronico</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="password" placeholder="Contraseña" class="form-control">
                                    <label for="">Contraseña</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
