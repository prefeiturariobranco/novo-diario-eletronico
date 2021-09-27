@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{route('usuarios.alterar', $user->id)}}" method="POST" class="form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="control-label col-md-2">Nome</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label col-md-2">Email</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email}}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label col-md-2">Senha</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" id="password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="control-label col-md-2">Confirmação de senha</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="admin" class="control-label col-md-2">Usuario Admin</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" id="admin" name="admin" value="{{$user->admin}}" required>
                                @if ($errors->has('admin'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('admin') }}</strong>
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
