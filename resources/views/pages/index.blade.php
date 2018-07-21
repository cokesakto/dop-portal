@extends('layouts.app')

@section('content')
<!-- 	<H1>{{$title}}</H1> -->
	<div class="container">
		<div class="row">
	<div class="jumbotron text-center">
		<h1> Welcome to iMSL - POD Portal</h1>
		<p> 
			@if(Auth::guest())
			<!-- <a class="btn btn-primary bnt-lg" href="/login" role='button'>Login</a>
			<a class="btn btn-primary bnt-lg" href="/register" role='button'>Register</a> -->
			@endif
		</p>
	</div>
	</div>
	</div>

	<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">TRACKING</div> -->

                <div class="panel-body">

                    <label>Search TDN : </label>
                   	<input type="text" name="txtTdnNumber" id="txtTdnNumber" class="form-control">		
                  	<br>
			        <input type="button" name="btnSearch"  id="btnSearch" onclick="fncSearch()" value="Search" class="btn btn-primary">      
			        <br>
			        <div id="searchResult" class=""></div>	
			    

                </div>
            </div>
    </div>
	</div>

<script type="text/javascript">
	function fncSearch(){
		var txtTdnNumber = $('#txtTdnNumber').val();
		//alert(txtTdnNumber)

		if(txtTdnNumber!=''){
			 $.get( "{{ url('trackingSearchResult?id=') }}"+txtTdnNumber, function( data ) {
                   $( "#searchResult" ).html( data );  
            });
		}
	}
</script>	
@endsection
