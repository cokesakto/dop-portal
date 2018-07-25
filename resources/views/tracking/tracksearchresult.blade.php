<?php
if(count($trackshdr)>0){ 

	$outputhead = '<br>
					<div class="table-responsive">
                    <table class="table table-bordered table-striped " style="width:50%">
                        <thead>
                            <tr>
                                <th>REFERENCE NO.</th>
                                <th>TDN</th>
                                <th>STATUS</th>
	                            <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>';

    foreach ($trackshdr as $tracks){   
   
    $outputbody =  '<tr> 
                        <td>'.$tracks->refno.'</td>
                        <td>'.$tracks->tdn.'</td>
                        <td>'.$tracks->status.'</td>
                        <td><a href="/trackingClientView/'.$tracks->tdn.'" class="btn btn-default">View</a></td>
                    </tr>';
    }

    $outputtail = ' 	</tbody>
                    </table>
                </div>'; 

 	echo $outputhead;
 	echo $outputbody;
 	echo $outputtail;
 }else{  
    echo '<br>No Record Found ';  
 } 
 ?>  