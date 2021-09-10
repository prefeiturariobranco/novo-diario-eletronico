<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
        $itens = User::all();
        return view('usuarios.index', ['itens'=> $itens]);
    }
    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        return Redirect::to('/usuarios');

        return redirect('usuarios')->withSuccess('Usuário cadastrado com sucesso');
    }
}

