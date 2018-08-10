@extends('layouts.datatableapp')

@section('content')

<div class="container">
@if(!Auth::guest())
<div class="row">    
    <div class="panel panel-default"> 
        <div class="panel-body">
            <div style="text-align: right;margin-right: 20px;">
            <a href="/usersetup/create" class="btn btn-primary" style="text-align: right;">Add New User</a>
            </div>
            <table class="datatable mdl-data-table dataTable" cellspacing="0" width="100%" role="grid">
                <thead>
                    <tr>
                        <th width="20%">ID</th>
                        <th width="30%">EMAIL</th>
                        <th width="40%">NAME</th>
                        <th width="40%">ROLE</th>
                        <th width="40%">COMPANY</th>
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

                ajax: '{{ route('serverSideUsers') }}',
                columnDefs: [
                             {
                                 targets: [ 1, 2, 3],
                                 className: 'mdl-data-table__cell--non-numeric'
                             }
                         ]
            });


    });


  </script>
 
@endsection 