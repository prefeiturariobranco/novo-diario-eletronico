@extends('layouts.app')

@section('content')
    <div class=row>
        <div class="col-md-12">
            <iframe src="{{ "/web/viewer.html?file=../storage/anexos/$file" }}" style="width:100%; height:700px;"></iframe>
        </div>
    </div>
@endsection