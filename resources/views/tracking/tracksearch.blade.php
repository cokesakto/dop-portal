@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">TRACKING</div> -->

                <div class="panel-body">

                    <label>TDN Number : </label>
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