@extends('layouts.datatableapp')

@section('content')
<style type="text/css">
    table.dataTable tbody th,
    table.dataTable tbody td {
      white-space: nowrap;
    }
</style>   
<div class="container">
<div class="row">    
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="datatable mdl-data-table dataTable" cellspacing="0" width="100%" role="grid">
                <thead>
                    <tr>
                        <th width="10%">TDN</th>
                        <th width="10%">MODE</th>
                        <th width="20%">SHIPPER</th>
                        <th width="10%">PICKUP DATE</th>
                        <th width="20%">CONSIGNEE</th>
                        <th width="10%">DELIVERY DATE</th>
                        <th width="10%">STATUS</th>
                        <th width="10%">ACTION</th>
                    </tr>
                </thead>
              
            </table>
        </div>  <!-- <div class="panel-body"> -->  
    </div>   <!-- <div class="panel panel-default"> --> 
</div> <!-- <div class="row">  -->   
  

    <script>

    $(document).ready(function(){

          $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,

                ajax: '{{ route('serverSideTracking') }}'/*,
                columnDefs: [
                             {
                                 className: 'mdl-data-table__cell--non-numeric'
                             }
                         ]*/
            });


      /*     $('.datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('serverSideTracking') !!}',
              columns: [
                  { data: 'tdn', name: 'tdn' },
                  { data: 'transportmode', name: 'transportmode' },
                  { data: 'shipper', name: 'shipper' },
                  { data: 'booking', name: 'booking' },
                  { data: 'bill_of_ladding', name: 'bill_of_ladding' },
                  { data: 'status', name: 'status' }
              ]
          });*/

    });


  </script>

</div>  <!-- <div class="container"> -->
@endsection 