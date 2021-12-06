@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <x-alert/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active">Publicar Diário</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body col-md-10 align-self-center">
                    <form action="{{route('admin.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="numero" class="control-label col-md-2">Número</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="number" name="number" value="{{ old('number') }}"  placeholder="Ex: 001, 002, 003...">
                                <span class="help-block">
                                <strong>Para edições extras, adicionar letra ao número, exemplo: 002-A</strong>
                            </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="disclosure" class="control-label col-md-2">Divulgação</label>
                            <div class="col-md-10">
                                <input type="datetime-local" class="form-control datepicker" id="disclosure" name="disclosure" value="{{ old('disclosure') }}" placeholder="dia/mês/ano" data-provide="datepicker">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file" class="control-label col-md-2">Anexo</label>
                            <div class="col-md-10">
                                <input type="file" id="file" name="file" value="{{ old('file') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
