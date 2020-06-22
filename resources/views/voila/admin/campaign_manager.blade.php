@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    <h1>Campaign Manager</h1>
@stop

@section('content')
    <p>Send Your Customers Promotional Offers</p>
    <div class="input-group mb-3">
    	<input type="text" class="form-control" placeholder="Custom Message" aria-label="Custom Message" aria-describedby="button-addon2">
    	<div class="input-group-append">
    		<button class="btn btn-outline-secondary" type="button" id="button-addon2">Send</button>
    	</div>
    </div>
    <div>
    	<strong>
    		Message will be sent on all the emails and phone numbers available
    	</strong>
    </div>
@stop

@section('css')
    
@stop

@section('js')

@stop