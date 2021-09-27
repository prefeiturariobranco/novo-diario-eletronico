<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function index(){
        if (!Auth::user()->admin==1){
            return redirect('/');
        }
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
            return redirect('usuarios')->withSuccess('Usuário deletado com sucesso');
        }
    }

    public function edit(User $user)
    {
        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, User $user){

//        $user = User::findOrFail($user);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'admin' => 'required'
        ]);

        $user->fill($request->all());
//        $user->admin = $request->admin;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('usuarios')->withSuccess('Usuário editado com sucesso');
    }
}

