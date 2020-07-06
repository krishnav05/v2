@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
    	@foreach($tables as $table)
        <div class="col-lg-4"><p><a href="/admin/set/{{$table['table_no']}}">Table {{$table['table_no']}}</a></p></div>
        @endforeach
    </div>
</div>


@endsection

@section('js')

@stop

@section('css')
@stop