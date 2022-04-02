<?php

namespace App\Http\Controllers;

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
        $user->password =  Hash::make($request->primerNombre);

        $fkDocumento = '';
        $documento = '';
        $usuario = User::where('numeroDocumento', $request->numeroDocumento)->get();
        foreach ($usuario as  $item) {
            $fkDocumento = $item['fkTipoDocumento'];
            $documento = $item['numeroDocumento'];
        }

        if ($fkDocumento === (int)$request->fkTipoDocumento && $documento === $request->numeroDocumento) {
            return redirect()->back()->with('message', 'Este usuario ya se encuentra registrado en el sistema');
        }

        if ($user->save()) {
            return redirect()->back()->with('message', 'El usuario se ha registrado exitosamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
