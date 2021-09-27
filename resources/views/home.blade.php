@extends('layouts.app')

@push('filter')
    @if (Request::segment(1) !== 'login')
        <div class="col-md-4 results-filter">
            <form action="/">
                <span>Filtrar por: </span>
                <select name="mes">
                    @foreach (meses() as $mes => $mes_nome)
                        <option {{ $mes == (isset($mes_filtro)? $mes_filtro:date('m')) ? 'selected' : '' }} value="{{ $mes }}">{{ $mes_nome }}</option>
                    @endforeach
                </select>
                <select name="ano">
                    @foreach (anos() as $ano)
                        <option {{ $ano == (isset($ano_filtro)? $ano_filtro:date('Y')) ? 'selected' : '' }} value="{{ $ano }}">{{ $ano }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-xs btn-primary">Filtrar</button>
            </form>
        </div>
    @endif
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">

                    @if(isset($termo))
                        <h3 style="margin-top:11px;margin-bottom:22px"><small>Resultados da pesquisa para: </small><em>{{ $termo }}</em></h3>
                    @endif

                    <table class="table table-striped" id="table_id">
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
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->disclosure->format('d/m/Y') }}</td>
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

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>

@endsection


