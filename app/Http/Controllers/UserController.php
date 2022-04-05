<?php

namespace App\Http\Controllers;

use App\Custom\Modal;
use App\Models\tipodocumento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::join('tipodocumento', 'tipodocumento.id', '=', 'users.fkTipoDocumento')
            ->select('tipodocumento.tipoDocumento', 'users.*')
            ->orderBy('id', 'DESC')->paginate(10);
        $tipoDocumento = tipodocumento::all();

        return view('users.user', compact('users', 'tipoDocumento'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'primerNombre' => 'required',
            'primerApellido' => 'required',
            'segundoApellido' => 'required',
            'fkTipoDocumento' => 'required',
            "numeroDocumento" => 'required',
            "email" => 'unique:users,email' . $user->id,
            "password" => 'required',
        ]);
        $segundoNombre = $request->segundoNombre;
        if ($request->primerNombre === null) {
            $segundoNombre = null;
        }
        $user->primerNombre = $request->primerNombre;
        $user->segundoNombre = $segundoNombre;
        $user->primerApellido = $request->primerApellido;
        $user->segundoApellido = $request->segundoApellido;
        $user->fkTipoDocumento = $request->fkTipoDocumento;
        $user->numeroDocumento = $request->numeroDocumento;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);

        $fkDocumento = '';
        $documento = '';
        $usuario = User::join('tipodocumento', 'tipodocumento.id', '=', 'users.fkTipoDocumento')
            ->select('tipodocumento.tipoDocumento', 'users.*')
            ->where('numeroDocumento', $request->numeroDocumento)->get();
        foreach ($usuario as  $item) {
            $fkDocumento = $item['fkTipoDocumento'];
            $documento = $item['numeroDocumento'];
            $tipoDocumento = $item['tipoDocumento'];
        }

        if ($fkDocumento === (int)$request->fkTipoDocumento && $documento === $request->numeroDocumento) {
            return redirect()->back()->with('message', $tipoDocumento . ' con numero: ' . $documento . ', no se puede registrar. Ya hay un regitro en el sistema.');
        }

        if ($user->save()) {
            return redirect()->back()->with('message', 'El usuario se ha registrado exitosamente');
        }
    }

    public function edit(Modal $modal, Request $request)
    {
        $usuario = User::join('tipodocumento', 'tipodocumento.id', '=', 'users.fkTipoDocumento')
            ->select('tipodocumento.tipoDocumento', 'users.*')
            ->where('users.id', $request->id)->get();
        foreach ($usuario as $item) {
            $primerNombre = $item['primerNombre'];
            $segundoNombre = $item['segundoNombre'];
            $primerApellido = $item['primerApellido'];
            $segundoApellido = $item['segundoApellido'];
            $fkTipoDocumento = $item['fkTipoDocumento'];
            $tipoDocumentoName = $item['tipoDocumento'];
            $numeroDocumento = $item['numeroDocumento'];
            $email = $item['email'];
        }

        $tipoDocumentoLista = tipodocumento::all();

        $contenidoModal = "                <div class='row g-3'>";
        //
        $contenidoModal .= "                  <div class='col-12 col-lg-6'>";
        $contenidoModal .= "                    <div class='form-floating'>";
        $contenidoModal .= "                      <input  id='primerNombreUpdate' type='text' class='form-control' placeholder='Primer nombre' value='$primerNombre'>";
        $contenidoModal .= "                      <label for=''>Primer nombre <b class='text-danger'>*</b></label>";
        $contenidoModal .= "                    </div>";
        $contenidoModal .= "                  </div>";
        //
        $contenidoModal .= "                  <div class='col-12 col-lg-6'>";
        $contenidoModal .= "                    <div class='form-floating'>";
        $contenidoModal .= "                      <input  id='segundoNombreUpdate' type='text' class='form-control' placeholder='Segundo nombre' value='$segundoNombre'>";
        $contenidoModal .= "                      <label for=''>Segundo nombre</label>";
        $contenidoModal .= "                    </div>";
        $contenidoModal .= "                  </div>";
        //
        $contenidoModal .= "                  <div class='col-12 col-lg-6'>";
        $contenidoModal .= "                    <div class='form-floating'>";
        $contenidoModal .= "                      <input  id='primerApellidoUpdate' type='text' class='form-control' placeholder='Primer apellido' value='$primerApellido'>";
        $contenidoModal .= "                      <label for=''>Primer apellido <b class='text-danger'>*</b></label>";
        $contenidoModal .= "                    </div>";
        $contenidoModal .= "                  </div>";
        //
        $contenidoModal .= "                  <div class='col-12 col-lg-6'>";
        $contenidoModal .= "                    <div class='form-floating'>";
        $contenidoModal .= "                      <input  id='segundoApellidoUpdate' type='text' class='form-control' placeholder='Segundo apellido' value='$segundoApellido'>";
        $contenidoModal .= "                      <label for=''>Segundo apellido <b class='text-danger'>*</b></label>";
        $contenidoModal .= "                    </div>";
        $contenidoModal .= "                  </div>";
        //
        $contenidoModal .= "                  <div class='col-12 col-lg-6 '>";
        $contenidoModal .= "                    <div class='form-floating'>";
        $contenidoModal .= "                      <select id='tipoDocumentoUpdate' class='form-select' aria-placeholder='Tipo de documento'>";
        $contenidoModal .= "                        <option value='$fkTipoDocumento' selected>$tipoDocumentoName</option>";

        foreach ($tipoDocumentoLista as  $item) {
            if ($item['id'] != $fkTipoDocumento) {
                $contenidoModal .= "                        <option value='{$item['id']}'>{$item['tipoDocumento']}</option>";
            }
        }
        $contenidoModal .= "                      </select>";
        $contenidoModal .= "                      <label for=''>Tipo de documento <b class='text-danger'>*</b></label>";
        $contenidoModal .= "                    </div>";
        $contenidoModal .= "                    </div>";
        //
        $contenidoModal .= "                  <div class='col-12 col-lg-6'>";
        $contenidoModal .= "                    <div class='form-floating'>";
        $contenidoModal .= "                      <input  id='documentoUpdate' type='number' class='form-control' placeholder='Documento' value='$numeroDocumento'>";
        $contenidoModal .= "                      <label for=''>Documento <b class='text-danger'>*</b></label>";
        $contenidoModal .= "                    </div>";
        $contenidoModal .= "                  </div>";
        //
        $contenidoModal .= "                  <div class='col-12 mb-3'>";
        $contenidoModal .= "                    <div class='form-floating'>";
        $contenidoModal .= "                      <input  id='correoUpdate' type='email' class='form-control' placeholder='Correo' value='$email'>";
        $contenidoModal .= "                      <label for=''>Correo <b class='text-danger'>*</b></label>";
        $contenidoModal .= "                    </div>";
        $contenidoModal .= "                  </div>";
        //
        $contenidoModal .= "                    </div>";
        //
        $contenidoModal .= "                <div class='d-grid'>";
        $contenidoModal .= "                <button value=' $request->id' class='btn btn-outline-primary' id='btn-actualizar-usuario'>Actualizar usuario</button>";
        $contenidoModal .= "                </div>";
        //
        $contenidoModal .= "                  </div>";

        $modal->modalInformativa("text-primary", "Modal Actualizar usuario", $contenidoModal);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Modal $modal)
    {
        if (
            empty($request->primerNombre) != 1 && empty($request->primerApellido) != 1 &&
            empty($request->segundoApellido) != 1 && empty($request->documento) != 1 &&
            empty($request->correo) != 1
        ) {

            $segundoNombre = $request->segundoNombre;
            if ($request->primerNombre === null) {
                $segundoNombre = null;
            }

            $user = User::find($request->id);
            $user->primerNombre = $request->primerNombre;
            $user->segundoNombre = $segundoNombre;
            $user->primerApellido = $request->primerApellido;
            $user->segundoApellido = $request->segundoApellido;
            $user->fkTipoDocumento = $request->fkTipoDocumento;
            $user->numeroDocumento = $request->documento;
            $user->email = $request->correo;

            $usuario = User::where([
                ['numeroDocumento', '=', $request->documento],
                ['id', '!=', $request->id],
                ['fkTipoDocumento', '=', $request->fkTipoDocumento]
            ])->get();


            if (count($usuario) >= 1) {
                return  $modal->modalAlerta("text-warning", "Modal Actualizar usuario", "Este documento ya esta registrado");
            }

            if ($user->update()) {
                return  $modal->modalAlerta("text-primary", "Modal Actualizar usuario", "Usuario actualizado");
            }
        } else {
            return  $modal->modalAlerta("text-warning", "Modal Actualizar usuario", "Todos los campos son requeridos");
        }
    }

    /**
     * Remove the specidied resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
