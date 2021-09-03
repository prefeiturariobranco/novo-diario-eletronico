@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="feedback"></div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Criado em</th>
                            <th>Apagar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($itens as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->created_at->format('d/m/Y à\s H:i') }}</td>
                                <td>
                                    <a href="{{ "/usuarios/$item->id" }}" class="confirm-delete" style="color: #903031;">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Nenhum usuário cadastrado</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <a href="/usuarios/adicionar" class="btn btn-primary">Adicionar novo</a>
                </div>
            </div>
        </div>
    </div>
@endsection
