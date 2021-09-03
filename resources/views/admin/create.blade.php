@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="/admin" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="numero" class="control-label col-md-2">Número</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero') }}" required placeholder="Ex: 001, 002, 003...">
                                <span class="help-block">
                                <strong>Para edições extras, adicionar letra ao número, exemplo: 002-A</strong>
                            </span>

                                @if ($errors->has('numero'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('numero') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="divulgacao" class="control-label col-md-2">Divulgação</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control datepicker" id="divulgacao" name="divulgacao" value="{{ old('divulgacao') }}" placeholder="dia/mês/ano" data-provide="datepicker" required>

                                @if ($errors->has('divulgacao'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('divulgacao') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
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
