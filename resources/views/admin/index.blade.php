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

                    @if(isset($termo))
                        <h3 style="margin-top:11px;margin-bottom:22px">
                            <small>Resultados da pesquisa para: </small>
                            <em>{{ $termo }}</em>
                        </h3>
                    @endif

                    <table class="table" id="table_id">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Divulgação</th>
                                <th>Visualizar</th>
                                <th>Editar</th>
                                <th>Apagar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($itens as $item)
                            <tr>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->disclosure->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{"visualizar/$item->id"}}" target="_blank" style="color: #903031;">
                                        <span class="fa fa-file-pdf-o"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ "/admin/edit/$item->id" }}" style="color: #903031;">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('registro.delete', ['item'=>$item->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Nenhum registro publicado ainda</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <a href="/admin/adicionar" class="btn btn-primary">Adicionar novo</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>

@endsection
