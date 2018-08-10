<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables/dataTables.material.min.css') }}" >

    <link rel="stylesheet" type="text/css" href="{{ asset('css/material-design-lite/1.1.0/material.min.css') }}" >


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

 <!--    <script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.3.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/datatable/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/datatable/DataTables-1.10.12/js/dataTables.material.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/boostrap/3.3.7/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/datatable/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script> -->

   <!--  <script type="text/javascript" src="kendoui/js/kendoui/jquery.min.js"></script> -->
    <script type="text/javascript" src="{{ URL::asset('js/kendoui/js/kendoui/jquery.min.js') }}"></script>
	<!-- <script type="text/javascript" src="kendoui/js/kendoui/kendo.web.min.js"></script> -->
	<script type="text/javascript" src="{{ URL::asset('js/kendoui/js/kendoui/kendo.web.min.js') }}"></script>
	<!-- <script type="text/javascript" src="kendoui/js/kendoui/cultures/kendo.culture.fil-PH.min.js"></script> -->
	<script type="text/javascript" src="{{ URL::asset('js/kendoui/js/kendoui/cultures/kendo.culture.fil-PH.min.js') }}"></script>
		
	
	<!-- <link type="text/css" href="kendoui/css/kendoui/kendo.common.min.css" rel="stylesheet" />	 -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/kendoui/css/kendoui/kendo.common.min.css') }}" >
<!-- 	<link type="text/css" href="kendoui/css/kendoui/kendo.bootstrap.min.css" rel="stylesheet" /> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/kendoui/css/kendoui/kendo.bootstrap.min.css') }}" >

</head>

<body>
<style type="text/css">

.k-grid-toolbar a {
    float:left;
}	
.k-grid-content {
	/*200px*/
    min-height: 405px; 
}	

</style>

<script>
kendo.culture("fil-PH");

var grid_pivotpoint;

var attrCenter = {
	class: "table-cell",
	style: "text-align: center"
};

var attrRight = {
	class: "table-cell",
	style: "text-align: right"
};
	
$(document).ready(function() {
	grid_pivotpoint = $("#grid_pivotpoint").kendoGrid({
						
			toolbar: [],						
            dataSource: {
                transport: {              
                	 read: "/kendoviewlist"                   
                },
                parameterMap: function(options) {
	                    if (options.filter) {
	                        for (var i = 0; i < options.filter.filters.length; i++) {
	                            if (options.filter.filters[i].field == 'trade_date' || options.filter.filters[i].field == 'trade_date') {
	                                options.filter.filters[i].value = kendo.toString(options.filter.filters[i].value, "yyyy-MM-dd");
	                            }
	                        }
	                    }
	                    return options;
	            },    
	            /*success: function(response){ // What to do if we succeed
			        console.log(response); 
			    },   */       
                pageSize       : 13,
                serverPaging   : true,
              	serverFiltering: true,
                serverSorting  : true,
				
					
				/*sort: {
                        field: 'star',
                        dir: 'desc'
                      },	*/
                schema: {
                    data : "data",
                    total: "total",
                    model :{
                        id: "id",
                        fields: {	                        					
							tdn  : { editable : false },							
							shipper  : { editable : false },							
							status : { editable : false } //, type: "number"
							
                        }
                    }
                }				
            },
            requestStart: function () {
                kendo.ui.progress($("#loading"), true);// <-- this works on initial load, but gives two spinners on every page or sort change
            },
            requestEnd: function () {
                kendo.ui.progress($("#loading"), false);

            },
            pageable : {
                refresh   : true/*,
                pageSizes : true*/
            },        
            filterable: {
                extra: false,
                operators: false
            }, 
			navigatable: true,
			sortable : true,
			scrollable: true,
			resizable : true,
			selectable : true,			
			editable : true,			
            columns: [
				{
                    field: "tdn"
                    ,title: "TDN"
                    ,width: '30%'
                    ,headerAttributes: { style : 'text-align: center; font-weight: bolder;' }
                    ,attributes: { style : 'text-align: center;' }
                    ,sortable: true
                    ,filterable: {
                        extra: false,
                        operators: {
                            string: {                                
                                eq: "Is equal to",
                                contains: "Contains",
                                inn: "IN"
                            }
                        }
                    }
                },
              
                 {
                    field: "shipper"
                    ,title: "SHIPPER"
                    ,width: '40%'
                    ,headerAttributes: { style : 'text-align: center; font-weight: bolder;' }
                    ,attributes: { style : 'text-align: right;' }
                    ,sortable: true
                    ,filterable: false
                    ,format:"{0:n4}"
 
                },
                  {
                    field: "status"
                    ,title: "STATUS"
                    ,width: '20%'
                    ,headerAttributes: { style : 'text-align: center; font-weight: bolder;' }
                    ,attributes: { style : 'text-align: right;' }
                    ,sortable: true
                    ,filterable: false       
                     ,format:"{0:n2}"           
                }   
                ,{ command: { text: "View", click: doView }, title: " ",attributes : attrCenter }                                                				
            ]
        });	
      $(".k-grid-toolbar", "#grid_pivotpoint").append('<input tye="button" class="k-button" id="btnAdd" style="align:right;" value="Add New Item"></input>');
})

function statusFilter(element) {
    element.kendoDropDownList({
        dataSource: ['HOLD','BUY','SELL'],
        optionLabel: "--Select Value--"
    });
}


function doView(e) {
	////trucking/TDN200008
    e.preventDefault();

    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
  
   location.href = '/trucking/'+dataItem.tdn;
}

</script>
<div id="app">
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <img style="height: 50px; width: 90px;background: white;" src="/storage/logo/logo.png" alt="..." class="img-thumbnail" title="{{ config('app.name', 'Laravel') }}">
            <!-- <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a> -->
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav">
              <li><a href="/">Home</a></li>
               <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Inquiry <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="/trucking" onclick="">Trucking Inquiry</a>
                        </li>        
                    </ul>    
              </li>
                
             <!--  <li><a href="#">Reports</a></li> -->

              <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Maintenance <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="/truckingupload" onclick="">Trucking Upload</a>
                        </li>
                        <li>
                            <a href="#" onclick="">User Setup</a>
                        </li>        
                    </ul>    
              </li>
              <!-- <li><a href="/services">Services</a></li> -->
             <!--  <li><a href="/posts">Blog</a></li> -->
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            <!-- <li>
                                <a href="/posts/create">Create Post</a> 
                            </li> -->
                            <!-- <li>
                                <a href="/dashboard">Dashboard</a> 
                            </li> -->
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>    

<div class="container">
<div class="row">    
    <div class="panel panel-default">
        <div class="panel-body">
             <div class="">   
					<br>			
					<div id="grid_pivotpoint" style="min-height: 100%;"></div>									   
		    </div>
        </div>    
    </div>    
</div>    
</div>    


</div>  
</body>
</html>