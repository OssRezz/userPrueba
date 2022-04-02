@extends('layouts.layout')
@section('title', 'Usuarios')
@section('content')
    <div class="container-fluid my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-4">
                <div class="card mb-3">
                    <div class="card-header"><i class="fas fa-user text-primary"></i> <b>Formulario de usuarios</b></div>
                    <div class="card-body mb-3">
                        <div class="g-2">
                            <form action="usuarios/store" method="POST">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" name="primerNombre" placeholder="Primer nombre"
                                        class="form-control">
                                    <label for="">Primer nombre <b class="text-danger">*</b></label>
                                    @error('primerNombre')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="segundoNombre" placeholder="Segundo nombre"
                                        class="form-control">
                                    <label for="">Segundo nombre</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="primerApellido" placeholder="Primer apellido"
                                        class="form-control">
                                    <label for="">Primer apellido <b class="text-danger">*</b></label>
                                    @error('primerApellido')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="segundoApellido" placeholder="Segundo apellido"
                                        class="form-control">
                                    <label for="">Segundo apellido <b class="text-danger">*</b></label>
                                    @error('segundoApellido')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="fkTipoDocumento" class="form-select">
                                        @foreach ($tipoDocumento as $item)
                                            <option value="{{ $item->id }}">{{ $item->tipoDocumento }}</option>
                                        @endforeach
                                        @error('fkTipoDocumento')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </select>
                                    <label for="">Tipo de documento <b class="text-danger">*</b></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" name="numeroDocumento" placeholder="Numero documento"
                                        class="form-control">
                                    <label for="">Numero documento <b class="text-danger">*</b></label>
                                    @error('numeroDocumento')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" placeholder="Correo electronico"
                                        class="form-control">
                                    <label for="">Correo electronico</label>
                                    @error('email')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" placeholder="Contraseña" class="form-control">
                                    <label for="">Contraseña</label>
                                    @error('password')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-outline-primary">Ingresar usuario</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (session()->has('message'))
                        <div class="col px-3">
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header"><i class="fas fa-list text-primary"></i> <b>Lista de usuarios</b></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Primer nombre</th>
                                        <th>Segundo nombre</th>
                                        <th>Primer apellido</th>
                                        <th>Segundo apellido</th>
                                        <th>Tipo Documento</th>
                                        <th>Documento</th>
                                        <th>Email</th>
                                        <th class="text-center">Accion</th>
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
                                            <td class="text-center">
                                                <button value="{{ $item->id }}" id="btn-editar-usuario"
                                                    class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"
                                                        style="pointer-events: none;"></i></button>
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
    <script src="{{ asset('js/usuario.js') }}"></script>
@endsection
