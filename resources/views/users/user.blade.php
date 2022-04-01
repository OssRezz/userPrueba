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
            <div class="col">
                <div class="card">
                    <div class="card-header">Lista de usuarios </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Primer nombre</th>
                                        <th>Segundo nombre</th>
                                        <th>Primer apellido</th>
                                        <th>Segundo apellido</th>
                                        <th>Tipo Doc</th>
                                        <th>Documento</th>
                                        <th>Email</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item->primerNombre }}</td>
                                            <td>{{ $item->segundoNombre }}</td>
                                            <td>{{ $item->primerApellido }}</td>
                                            <td>{{ $item->segundoApellido }}</td>
                                            <td>{{ $item->tipoDocumento }}</td>
                                            <td>{{ $item->numeroDocumento }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <button class="btn btn-outline-primary btn-sm"><i
                                                        class="fas fa-edit"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class='row mx-0'>
                            <span
                                class="px-0">{{ $users->links('vendor/pagination/bootstrap-5', ['paginator' => $users]) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
