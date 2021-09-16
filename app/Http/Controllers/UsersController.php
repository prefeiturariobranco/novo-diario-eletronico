<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $itens = User::all();

        return view('usuarios.index', ['itens'=> $itens]);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('usuarios')->withSuccess('Usuário cadastrado com sucesso');
    }

    public function delete(User $user)
    {
        if ($user->delete()) {
            return redirect('usuarios');
        }
    }
}

