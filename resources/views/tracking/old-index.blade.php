@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
       <!--  <div class="col-md-8 col-md-offset-2"> -->
            <div class="panel panel-default">
                <!-- <div class="panel-heading">TRACKING</div> -->

                <div class="panel-body">
                   <!--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! -->

                   <!--  <a href="/posts/create" class="btn btn-primary">Create Post</a> -->

                    <h1>POD TRACKING PORTAL</h1>
                    @if(!Auth::guest())
	                    @if( count($tracks)>=0 )
		                    <table class="table table-striped">
		                        <tr>
		                            <th>TDN</th>
		                            <th>DELIVERY DATE</th>
		                            <th>CUSTOMER</th>
		                            <th>STATUS</th>
		                            <th></th>
		                        </tr>  

		                        @foreach( $tracks as $track)
		                        	<tr>
		                        		<td>{{$track->tdn}}</td>
		                        		<td>{{$track->date}}</td>
		                        		<td>{{$track->customer}}</td>
		                        		<td>{{$track->status}}</td>
		                        		
		                        		
		                        		<td><a href="/tracking/{{$track->tdn}}" class="btn btn-default">View</a></td>
		                        	</tr>
		                        @endforeach  


		                    </table>
		                    {{$tracks->links()}}
	                    @else
	                    	<p>No tracking record found.</p>

	                    @endif
                    @endif
                </div>
            </div>
       <!--  </div> -->
    </div>
</div>
	
@endsection 