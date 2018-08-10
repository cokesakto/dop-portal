@extends('layouts.app')

@section('content')
       
       <div style="width: 45%;margin: auto;">
       
       <h1>Create User</h1>	
      
       {!! Form::open(['action' => 'UsersSetupController@store', 'method' => 'POST']) !!}
              <div class='form-group'>
                     {{Form::label('name' , 'Full Name')}}    

                     {{Form::text('full_name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
              </div>

              <div class='form-group'>
                     {{Form::label('pass1' , 'Password')}}    

                     <!-- {{Form::password('pass1', '', ['class' => 'form-control', 'placeholder' => 'Password'])}} -->
                     <input type="password" class="form-control" id="password" name="password" placeholder="Password" value=''>
              </div>

              <div class='form-group'>
                     {{Form::label('pass2' , 'Confirm Password')}}    

                   <!--   {{Form::password('pass2', '', ['class' => 'form-control', 'placeholder' => 'Password'])}} -->
                     <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Password">
              </div>


              <div class='form-group'>
                     {{Form::label('email' , 'Email')}}    

                     {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
              </div>

              <div class='form-group'>
                     {{Form::label('role' , 'Role')}}    

                     {{Form::select('role', ['Admin' => 'Admin', 'Dispatching' => 'Dispatching', 'Trucking' => 'Trucking'], null, ['placeholder' => '--Select Role--','class' => 'form-control'])}}
              </div>

              <div class="form-group">
                     {!! Form::Label('company', 'Company') !!}

                     <select class="form-control" name="company" id="company">
                            <option value="">--Select Company--</option>
                            <option value="MSL">MAGSAYSAY SHIPPING & LOGISTICS</option>
                            @foreach($truckers as $truck)
                            <option value="{{$truck->code}}">{{$truck->description}}</option>
                            @endforeach
                     </select>
              </div>

             
              <a href="/usersetup" class="btn btn-primary">Cancel</a>&nbsp;&nbsp;
              {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
       {!! Form::close() !!}
       </div>
@endsection 