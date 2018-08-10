@extends('layouts.app')

@section('content')

	
        <div style="width: 55%;margin: auto;">
              <a href="/usersetup" class="btn btn-default">Go Back</a><br><br>


              <div class='form-group'>
                     {{Form::label('name' , 'Name')}}    

                     {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => '', 'readonly'])}}
              </div>

              <div class='form-group'>
                     {{Form::label('email' , 'Email')}}    

                     {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => '', 'readonly'])}}
              </div>

              <div class='form-group'>
                     {{Form::label('role' , 'Role')}}    

                     {{Form::text('role', $user->role, ['class' => 'form-control', 'placeholder' => '', 'readonly'])}}
              </div>

              <div class='form-group'>
                     {{Form::label('company' , 'Company')}}    

                     @foreach($truckers as $truck)
                            {{Form::text('company', $user->company_code.' - '.$truck->description, ['class' => 'form-control', 'placeholder' => '', 'readonly'])}}
                     @endforeach
              </div>

              <div class='form-group'>
                     {{Form::label('datecreated' , 'Date Created')}}    

                     {{Form::text('datecreated', $user->created_at, ['class' => 'form-control', 'placeholder' => 'Title', 'readonly'])}}
              </div>

      

       <hr>
       </div>

    <!--    @if(!Auth::guest())
           
                     {!! Form::open(['action'=> ['UsersSetupController@destroy', $user->id], 'method' => 'user', 'class' => 'pull-right']) !!}

                     		{{ Form::hidden('_method', 'DELETE')}}
                     		{{ Form::submit('Delete',['class'=> 'btn btn-danger'])}}

                     {!! Form::close() !!}
             
       @endif               -->
@endsection 