@extends('layouts.app')

@section('content')
       
       <div style="width: 45%;margin: auto;">
       
       <h1>Create New Trucker</h1>	<br>
      
       {!! Form::open(['action' => 'TruckersController@store', 'method' => 'POST']) !!}
              <div class='form-group'>
                     {{Form::label('code' , 'Company Code')}}    

                     {{Form::text('code', '', ['class' => 'form-control', 'placeholder' => 'Company Code'])}}
              </div>

              <div class='form-group'>
                     {{Form::label('name' , 'Company Name')}}    

                     {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Company Name'])}}
              </div>
              <br>
              <a href="/truckersetup" class="btn btn-primary">Cancel</a>&nbsp;&nbsp;
              {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
       {!! Form::close() !!}
       </div>
@endsection 