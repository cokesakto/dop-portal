@extends('layouts.app')

@section('content')

      <div style="width: 45%;margin: auto;">
         <h1>Edit User</h1>	
        
         {!! Form::open(['action' => ['TruckersController@update' , $truckers->id], 'method' => 'truckers' , 'style="width:100%"']) !!}

               <div class='form-group'>
                       {{Form::label('code' , 'Company Code')}}    

                       {{Form::text('code', $truckers->code, ['class' => 'form-control', 'placeholder' => 'Company Code', 'readonly'])}}
                </div>

                <div class='form-group' >
                       {{Form::label('description' , 'Company Name')}}    

                       {{Form::text('description', $truckers->description, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                </div>

                {{Form::hidden('_method', 'PUT')}}


                <a href="/truckersetup" class="btn btn-primary">Cancel</a>&nbsp;&nbsp;
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}<br><br>

         {!! Form::close() !!}
      </div>   

@endsection 