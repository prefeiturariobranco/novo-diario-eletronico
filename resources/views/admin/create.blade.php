@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active">Criar Edital</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body col-md-10 align-self-center">
                    <form action="{{route('admin.create')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="numero" class="control-label col-md-2">Número</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="numero" name="number" value="{{ old('numero') }}" required placeholder="Ex: 001, 002, 003...">
                                <span class="help-block">
                                <strong>Para edições extras, adicionar letra ao número, exemplo: 002-A</strong>
                            </span>

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="divulgacao" class="control-label col-md-2">Divulgação</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control datepicker" id="divulgacao" name="divulgacao" value="{{ old('divulgacao') }}" placeholder="dia/mês/ano" data-provide="datepicker" required>

                                @if ($errors->has('divulgacao'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('divulgacao') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="anexo" class="control-label col-md-2">Anexo</label>
                            <div class="col-md-10">
                                <input type="file" id="anexo" name="anexo" value="{{ old('anexo') }}" required>

                                @if ($errors->has('anexo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('anexo') }}</strong>
                                </span>
                                @endif
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
