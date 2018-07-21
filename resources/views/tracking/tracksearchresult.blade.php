<?php
if(count($trackshdr)>0){ 

	$outputhead = '<br>
					<div class="table-responsive">
                    <table class="table table-bordered table-striped " style="width:50%">
                        <thead>
                            <tr>
                                <th>TDN</th>
	                            <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>';

    foreach ($trackshdr as $tracks){   
   
    $outputbody =  '<tr> 
                        <td>'.$tracks->tdn.'</td>
                        <td>'.$tracks->status.'</td>
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