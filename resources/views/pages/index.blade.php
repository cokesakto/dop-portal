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

                    <label>Search Reference No. : </label>
                   	<input type="text" name="txtRefno" id="txtRefno" class="form-control">		
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
		var txtRefno = $('#txtRefno').val();

		if(txtRefno!=''){
			 $.get( "{{ url('trackingSearchResult?id=') }}"+txtRefno, function( data ) {
                   $( "#searchResult" ).html( data );  
            });
		}
	}

    document.onkeydown = function(){
    	if(window.event.keyCode=='13'){
    		fncSearch();
    	}
    }
</script>	
@endsection
