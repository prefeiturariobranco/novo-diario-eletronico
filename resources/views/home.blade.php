@extends('layouts.app')

@push('filter')
    @if (Request::segment(1) !== 'login')
        <div class="col-md-5 align-self-center">
            <form action="/"  class="form-inline ">
                <span>Filtrar por: </span>
                <select name="mes" class="form-control col-md-4 ml-2">
                    @foreach (meses() as $mes => $mes_nome)
                        <option {{ $mes == (isset($mes_filtro)? $mes_filtro:date('m')) ? 'selected' : '' }} value="{{ $mes }}">{{ $mes_nome }}</option>
                    @endforeach
                </select>
                <select name="ano" class="form-control col-md-3 ml-2">
                    @foreach (anos() as $ano)
                        <option {{ $ano == (isset($ano_filtro)? $ano_filtro:date('Y')) ? 'selected' : '' }} value="{{ $ano }}">{{ $ano }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-xs btn-primary ml-2">Filtrar</button>
            </form>
        </div>
    @endif
@endpush

@section('content')

    @include('searchbar')
    <div class="row">
        <div class="col-md-12 col-md-offset-2 " style="margin-bottom: 100px">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active">Listar Editais</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">

                    @if(isset($termo))
                        <h3 style="margin-top:11px;margin-bottom:22px"><small>Resultados da pesquisa para: </small><em>{{ $termo }}</em></h3>
                    @endif

                    <table class="table table-striped" id="myTable">
                        <thead style="text-align-last: center">
                        <tr>
                            <th>Número</th>
                            <th>Divulgação</th>
                            <th>Visualizar</th>
                        </tr>
                        </thead>
                        <tbody style="text-align-last: center">
                        @forelse ($itens as $item)
                            <tr>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->disclosure->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ "/visualizar/$item->id" }}" target="_blank" style="color: #903031;">
                                        <button class="btn btn-outline-dark">
                                            <span class="fa fa-file-pdf-o"></span>
                                        </button>
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

@push('js')
    <script>
        $('#myTable').dataTable({
            "language": {
                "sEmptyTable":   "Não foi encontrado nenhum registo",
                "sLoadingRecords": "A carregar...",
                "sProcessing":   "A processar...",
                "sLengthMenu":   "Mostrar _MENU_ registos",
                "sZeroRecords":  "Não foram encontrados resultados",
                "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
                "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
                "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
                "sSearch":       "Procurar:",
                "oPaginate": {
                    "sFirst":    "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext":     "Seguinte",
                    "sLast":     "Último"
                },
                "oAria": {
                    "sSortAscending":  ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    </script>
@endpush


