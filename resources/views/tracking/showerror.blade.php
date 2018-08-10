@extends('layouts.app')
@include('inc.messages')
@section('content')

	<a href="/trucking" class="btn btn-default">Go Back</a><br><br>

    <div class="alert alert-danger">
        {{ $error }}
    </div>  
    
            
@endsection 