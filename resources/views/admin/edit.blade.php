@extends('layouts.app')

@section('content')
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
                    <form action="{{ "/admin/$item->id" }}" method="POST" class="form-horizontal "
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="numero" class="col-sm-2 col-form-label">Número</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="numero" name="number"
                                       value="{{ old('numero') ?: $item->number }}" required
                                       placeholder="Para edições extras, usar -LETRA. Ex.: 1-A, 1-B etc">
                                @if ($errors->has('numero'))
                                    <span
                                        class="help-block"><strong>{{ $errors->first('numero') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="divulgacao" class="col-sm-2 col-form-label">Divulgação</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control datepicker" id="divulgacao"
                                       name="divulgacao"
                                       value="{{ old('divulgacao') ?: $item->disclosure->format('d/m/Y') }}"
                                       required>
                                @if ($errors->has('divulgacao'))
                                    <span
                                        class="help-block"><strong>{{ $errors->first('divulgacao') }}</strong></span>
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
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
