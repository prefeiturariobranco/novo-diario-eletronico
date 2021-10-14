@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <x-alert/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card ">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active">Editar</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body col-md-10 align-self-center">
                    <form action="{{route('admin.update', $item->id)}}" method="POST" class="form-horizontal "
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="numero" class="col-sm-2 col-form-label">Número</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="numero" name="number"
                                       value="{{ old('numero') ?: $item->number }}"
                                       placeholder="Para edições extras, usar -LETRA. Ex.: 1-A, 1-B etc" disabled>
                                <input type="hidden" name="number" value="{{ old('numero') ?: $item->number }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="divulgacao" class="col-sm-2 col-form-label">Divulgação Definida anteriormente</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control datepicker" value="{{$item->disclosure }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="divulgacao" class="col-sm-2 col-form-label">Nova Divulgação</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control datepicker" id="divulgacao"
                                       name="disclosure"
                                       value="{{ old('disclosure') ?: date('d/m/Y H:m:s', strtotime(($item->disclosure))) }}">
                                @if ($errors->has('disclosure'))
                                    <span
                                        class="help-block text-danger"><strong>{{ $errors->first('disclosure') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="anexo" class="col-sm-2 col-form-label">Anexo</label>
                            <div class="col-sm-10">
                                <input type="file" id="anexo" name="anexo" value="{{ old('anexo') }}">

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
                                <button href="{{route('admin.index')}}" class="btn btn-danger">Voltar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
