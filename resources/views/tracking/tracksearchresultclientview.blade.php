@extends('layouts.app')

@section('content')

	<a href="/" class="btn btn-default">Go Back</a><br><br>


       <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                           <h3>{{$trackshdr->tdn}}</h3>
                         <!--    <div class="row show-grid">
                                <div class="col-md-6">Shipper : <b>{!!$trackshdr->shipper!!}</b></div>
                                <div class="col-md-6">Status : <b>{!!$trackshdr->status!!}</b></div>
                            </div> -->
                            <div class="row show-grid">

                            <?php
                                if($trackshdr->transportmode=='Delivery'){
                            ?>
                                    <div class="col-md-6">Consignee : <b>{!!$trackshdr->consignee!!}</b></div>
                            <?php        
                                }else{
                            ?>
                                    <div class="col-md-6">Shipper : <b>{!!$trackshdr->shipper!!}</b></div>
                            <?php
                                }
                            ?>
                                
                                <div class="col-md-6">Transport Mode: <b>{!!$trackshdr->transportmode!!}</b></div>
                            </div>

                            <?php
                                if($trackshdr->transportmode=='Delivery'){
                            ?>
                                    <div class="row show-grid">
                                        <div class="col-md-6">Delivery Date : <b>{!!$trackshdr->delivery_date!!}</b></div>
                                        <div class="col-md-6">Delivery Address : <b>{!!$trackshdr->delivery_address!!}</b></div>
                                    </div>
                            <?php        
                                }else{
                            ?>
                                    <div class="row show-grid">
                                        <div class="col-md-6">Pickup Date : <b>{!!$trackshdr->pickup_date!!}</b></div>
                                        <div class="col-md-6">Pickup Address : <b>{!!$trackshdr->pickup_address!!}</b></div>
                                    </div>
                                   
                            <?php
                                }
                            ?>

                            <div class="row show-grid">
                                <div class="col-md-6">Carrier : <b>{!!$trackshdr->carrier!!}</b></div>
                                <div class="col-md-6">Equipment No. : <b>{!!$trackshdr->equipmentno!!}</b></div>
                            </div>
                            <div class="row show-grid">
                                <div class="col-md-6">Origin Port : <b>{!!$trackshdr->originport!!}</b></div>
                                <div class="col-md-6">Destination Port : <b>{!!$trackshdr->destinationport!!}</b></div>
                            </div>
                          
                            <div class="row show-grid">
                                <div class="col-md-6">Booking : <b>{!!$trackshdr->booking!!}</b></div>
                                <div class="col-md-6">Bill of Ladding : <b>{!!$trackshdr->bill_of_ladding!!}</b></div>
                            </div>
                            

                            <div class="row show-grid">
                                <div class="col-md-6">Trucker : <b>{!!$trackshdr->truckercode!!}</b></div>
                                <div class="col-md-6">Satisfactory Rate : <b>{!!$trackshdr->satisfactory_rate!!} / 5</b></div>
                            </div>

                            <div class="row show-grid">
                                <div class="col-md-6">Reference No. : <b>{!!$trackshdr->refno!!}</b></div>
                                <div class="col-md-6">Delivered Date : <b>{!!$trackshdr->modified_datetime!!}</b></div>
                            </div>

                            <div class="row show-grid">
                                <div class="col-md-12" >Remarks : <b>{!!$trackshdr->remarks!!}</b></div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
      <!--  <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
                 <div class="panel-body">
                     
                     @if(count($tracksdtl)>0)
                        <input type="button" id="btnShowDocs" name="btnShowDocs" class="btn btn-primary" value="View Documents" onclick="showDocs()">
                     @else
                        <p>No Documents found.</p>    
                     @endif  

                     <div id="dvDocs" style="display:none;">
                        <h3 id="grid-column-ordering">Documents</h3>
                     @if(count($tracksdtl)>0)
                         @foreach($tracksdtl as $dtl)
                         	@if($dtl->type == 'DOCS')
                                <?php
                                    $explode = explode('/', $dtl->path);
                                    $imgWatermarks = $explode['0'].'/'.$explode['1'].'/'.'watermarks_'.$explode['2'];
                                ?>
                         		<a href="/storage/{{$imgWatermarks}}" target="new"><img style="height:200px;width:200px;" src="/storage/{{$imgWatermarks}}" alt="..." class="img-thumbnail"></a> 
                               
                         	@else
                            	<a href="/storage/{{$dtl->path}}" target="new"><img style="height: 200px; width: 200px;background:white;" src="/storage/{{$dtl->path}}" alt="..." class="img-thumbnail"></a> 
                                
                            @endif	
                         @endforeach 
                     @else
                        <p>No Documents found.</p>    
                     @endif
                     </div>
                 </div>
             </div>
         </div>
       </div> -->
       @if(!Auth::guest())
             
      
                    
       @endif           

       
       <script type="text/javascript">
          /*  function showDocs(){
                $("#dvDocs").show();
                $("#btnShowDocs").hide();
            } */
       </script>   
@endsection 