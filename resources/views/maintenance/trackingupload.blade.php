@extends('layouts.app')

@section('content')

	<!-- <a href="/" class="btn btn-default">Go Back</a><br><br> -->

	   @if(!Auth::guest())
       <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Trucking Upload</h3>
                            <div class="row show-grid">
                               <!-- 
                                @if ($message = Session::get('success'))
									<div class="alert alert-success" role="alert">
										{{ Session::get('success') }}
									</div>
								@endif


								@if ($message = Session::get('error'))
									<div class="alert alert-danger" role="alert">
										{{ Session::get('error') }}
									</div>
								@endif -->

								<form style="border: 0px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('truckingImportExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">


									<input type="file" name="import_file" />
									{{ csrf_field() }}
									<br/>


									<button class="btn btn-primary">Import CSV or Excel File</button>


								</form>
								<br/>
                            </div>
                           
                           
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
     		
     		
       
             
      
                    
       @endif           

       
       <script type="text/javascript">

       </script>   
@endsection 