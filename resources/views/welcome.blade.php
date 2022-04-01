@extends('layouts.layout')
@section('title', 'Login')
@section('content')
    <div class="container-fluid py-5 my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card mb-3">
                    <div class="card-header"><b>Formulario de inicio de sesion</b></div>
                    <div class="card-body">
                        <form action="login" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="email" name="email" placeholder="Correo electronico" class="form-control">
                                <label for="">Correo electronico</label>
                                @error('email')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" name="password" placeholder="Contraseña" class="form-control">
                                <label for="">Contraseña</label>
                                @error('password')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-outline-primary">Iniciar sesion</button>
                            </div>
                        </form>
                    </div>
                </div>
                @if (session()->has('message'))
                    <div class="card-footer p-0">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
