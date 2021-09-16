@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

{{--            @include('searchbar')--}}

            <div class="panel panel-default">
                <div class="panel-body">

                    @if(isset($termo))
                        <h3 style="margin-top:11px;margin-bottom:22px"><small>Resultados da pesquisa para: </small><em>{{ $termo }}</em></h3>
                    @endif

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Número</th>
                            <th>Divulgação</th>
                            <th>Visualizar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($itens as $item)
                            <tr>
                                <td>{{ $item->numero }}</td>
                                <td>{{ $item->divulgacao->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ "/visualizar/$item->id" }}" target="_blank" style="color: #903031;">
                                        <span class="fa fa-file-pdf-o"></span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Nenhum registro publicado ainda</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
