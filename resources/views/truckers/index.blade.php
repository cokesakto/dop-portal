@extends('layouts.datatableapp')

@section('content')

<div class="container">
@if(!Auth::guest())
<div class="row">    
    <div class="panel panel-default"> 
        <div class="panel-body">
            <div style="text-align: right;margin-right: 20px;">
            <a href="/truckersetup/create" class="btn btn-primary" style="text-align: right;">Add New Trucker</a> 
            </div>
            <table class="datatable mdl-data-table dataTable" cellspacing="0" width="100%" role="grid">
                <thead>
                    <tr>
                        <th width="20%">RECORD ID</th>
                        <th width="20%">COMPANY CODE</th>
                        <th width="50%">COMPANY NAME</th>
                        <th width="10%">ACTION</th> 
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>    
    </div>    
</div>    
@endif
</div>    

    <script>

   $(document).ready(function(){

          $('.datatable').DataTable({


                processing: true,
                serverSide: true,
                responsive: true,

                ajax: '{{ route('serverSideTruckers') }}',
                columnDefs: [
                             {
                               /*  targets: [ 1, 3, 3],*/
                                 className: 'mdl-data-table__cell--non-numeric'
                             }
                         ]
            });


    });


  </script>
 
@endsection 