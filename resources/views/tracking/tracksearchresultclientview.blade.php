@extends('layouts.app')

@section('content')

	<a href="/" class="btn btn-default">Go Back</a><br><br>


       <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>{{$trackshdr->tdn}}</h3>
                            <div class="row show-grid">
                                <div class="col-md-6">Address : <b>{!!$trackshdr->del_address!!}</b></div>
                                <div class="col-md-6">Status : <b>{!!$trackshdr->status!!}</b></div>
                            </div>
                            <div class="row show-grid">
                                <div class="col-md-6">Customer : <b>{!!$trackshdr->customer!!}</b></div>
                                <div class="col-md-6">Delivered Date: <b>{!!$trackshdr->modified_datetime!!}</b></div>
                            </div>
                            <div class="row show-grid">
                                <div class="col-md-6">Delivery Schedule Date : <b>{!!$trackshdr->created_datetime!!}</b></div>
                                <div class="col-md-6">Delivered By : <b>{!!$trackshdr->modified_by!!}</b></div>
                            </div>
                            <div class="row show-grid">
                                <div class="col-md-12" >Reference No. : <b>{!!$trackshdr->refno!!}</b></div>
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
       <div class="row">
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
         <!-- /.col-lg-12 -->
       </div>
       @if(!Auth::guest())
             
      
                    
       @endif           

       <script type="text/javascript">
           function showDocs(){
                $("#dvDocs").show();
                $("#btnShowDocs").hide();

           }
       </script>   
@endsection 