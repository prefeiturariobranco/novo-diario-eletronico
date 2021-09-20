@extends('layouts.app')

@section('content')
    <div class=row>
        <div class="col-md-12">
            <embed src="{{"/storage/$file"}}" style="width:100%; height:700px;"/>
        </div>
    </div>
@endsection
