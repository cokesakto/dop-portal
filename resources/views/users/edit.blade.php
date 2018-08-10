@extends('layouts.app')

@section('content')

      <div style="width: 45%;margin: auto;">
         <h1>Edit User</h1>	
        
         {!! Form::open(['action' => ['UsersSetupController@update' , $user->id], 'method' => 'user' , 'style="width:100%"']) !!}

               <div class='form-group'>
                       {{Form::label('email' , 'Email')}}    

                       {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email', 'readonly'])}}
                </div>

                <div class='form-group' >
                       {{Form::label('name' , 'Name')}}    

                       {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name', 'readonly'])}}
                </div>


                <div class='form-group'>
                       {{Form::label('role' , 'Role')}}    

                       {{Form::select('role', ['Admin' => 'Admin', 'Dispatching' => 'Dispatching', 'Trucking' => 'Trucking'], $user->role, ['placeholder' => '--Select Role--','class' => 'form-control'])}}
                </div>

                <div class="form-group">
                       {!! Form::Label('company', 'Company') !!}
<!-- selected="selected" -->
                       <select class="form-control" name="company" id="company">
                              <option value="">--Select Company--</option>
                              <option value="MSL"
                                @if($user->company_code=="MSL")
                                  selected="selected"
                                @endif
                              >MAGSAYSAY SHIPPING & LOGISTICS</option>
                              @foreach($truckers as $truck)
                              <option value="{{$truck->code}}" 
                                @if($user->company_code==$truck->code)
                                  selected="selected"
                                @endif
                                >{{$truck->description}}</option>
                              @endforeach
                       </select>
                </div>

                <div style="vertical-align: top">
                {{Form::label('changePasswd' , 'Change Password')}} &nbsp;&nbsp;
                
                </div>
                <div class="form-group">
                    <!--    {{ Form::checkbox('chkPwd', 'value', ['style' => 'form-control']) }} -->

                        <input  name="chkPwd" id="chkPwd" type="checkbox" value="check"  style="width: 20px;height: 20px;" onchange="showPwd()">

                        <div id="dvPwd" style="display: none;">
                              {{Form::label('name' , 'Password')}}    

                              <!-- {{Form::password('password', '', ['class' => 'form-control', 'placeholder' => 'Password'])}} -->
                               <input type="password" class="form-control" id="password" name="password" placeholder="Password" value=''>
                              
                              {{Form::label('name' , 'Confirm Password')}}    

                              <!-- {{Form::password('confirmpassword', '', ['class' => 'form-control', 'placeholder' => 'Password'])}} -->
                              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Password">
                        </div>
                </div>

                {{Form::hidden('_method', 'PUT')}}


                <a href="/usersetup" class="btn btn-primary">Cancel</a>&nbsp;&nbsp;
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}<br><br>

         {!! Form::close() !!}
      </div>   

       <script type="text/javascript">
              function showPwd(){
                     if($('#chkPwd').is(":checked")){
                            $("#dvPwd").show();         
                     }else{
                            $("#dvPwd").hide();   
                     }
              }
       </script>
      

@endsection 