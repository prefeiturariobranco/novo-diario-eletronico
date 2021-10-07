@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-2" style="margin-bottom: 100px">

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active">Listar Usuarios</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Editar</th>
                            <th>Apagar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($itens as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a href="{{route('usuarios.editar', ['user'=>$item->id])}}">
                                        <button class="btn btn-outline-info">Editar </button></a>
                                </td>
                                <td>
                                    <form action="{{route('usuarios.delete', ['user'=>$item->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Nenhum usuário cadastrado</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="panel-footer">
                        <a href="/usuarios/adicionar" class="btn btn-primary">Adicionar novo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



        </div>
    </div>
@endsection
