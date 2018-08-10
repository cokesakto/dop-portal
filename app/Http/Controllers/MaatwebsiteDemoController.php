<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Tracking;
use App\TrackingTemp;
use Input;
use DB;
use Excel;

class MaatwebsiteDemoController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
        
    }

	public function trackingupload()
	{

		if(auth()->user()->role==config('constants.role_trucking') or auth()->user()->role==''){ 
            return view('tracking.showerror')->with('error','Unauthorized Access');
        }else{
        	return view('maintenance.trackingupload');
        }	
	}

	public function downloadExcel($type)
	{
		$data = Item::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	/*
	 * Import file into database Code		
	 */
	public function importExcel(Request $request)
	{

		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();


			$data = Excel::load($path, function($reader) {})->get();

			//print_r($data); die;
			if(!empty($data) && $data->count()){

				foreach ($data->toArray() as $key => $value) {
					if(!empty($value)){
						if(!empty($value['tdno'])){


							if(!empty($value['truckercode'])){
								$resTruckerCode = DB::select("Select count(*) cnt from truckers where code='{$value['truckercode']}'");

								$truckCodeCnt=0;
								foreach($resTruckerCode as $resTruckerCodeVal){
									 $truckCodeCnt = $resTruckerCodeVal->cnt;
								}

								if($truckCodeCnt==0){
   									return back()->with('error','Invalid Trucker Code : '.$value['truckercode']. ' at TDN: '.$value['tdno']);
   								}
							}

							if($value['shipper']!=''){
								$shipper_explode = explode('-', $value['shipper']);
								$shipper_explode_code = $shipper_explode[0];
								$shipper_explode_desc = $shipper_explode[1];
							}else{
								$shipper_explode_code = '';
								$shipper_explode_desc = '';
							}	

							if($value['consignee']!=''){
								$consignee_explode = explode('-', $value['consignee']);
								$consignee_explode_code = $consignee_explode[0];
								$consignee_explode_desc = $consignee_explode[1];
							}else{
								$consignee_explode_code = '';
								$consignee_explode_desc = '';
							}
							

							$insert[] = [
							'tdn' => trim($value['tdno']),  
							'carrier' => trim($value['carrier']),  
							'status' => 'Open',
							'transportmode' => trim($value['transportmode']),
							'shippercode' => trim($shipper_explode_code),
							'shipper' => trim($shipper_explode_desc),
							'consigneecode' => trim($consignee_explode_code),
							'consignee' => trim($consignee_explode_desc),
							'equipmentno' => trim($value['equipmentno']),
							'originport' => trim($value['originport']),
							'destinationport' => trim($value['destinationport']),
							'booking' => trim($value['booking']),
							'bill_of_ladding' => trim($value['billoflading']),
							'vessel' => trim($value['vessel']),
							'vessel_voyage' => trim($value['vesselvoyage']),
							'pickup_date' => trim($value['pickupdate']),
							'pickup_address' => trim($value['pickupaddress']),
							'delivery_date' => trim($value['deliverydate']),
							'delivery_address' => trim($value['deliveryaddress']),
							'truckercode' => trim($value['truckercode']),
							'plateno' => trim($value['plateno']),
							'document_list' => trim($value['documentlist']),
							'created_datetime' => date('Y-m-d H:i:s'),
							'created_by' => auth()->user()->id
							];
						}//if(!empty($value['tdno'])){	
					}//if(!empty($value)){
				}//foreach ($data->toArray() as $key => $value) {

				if(!empty($insert)){

					try {
						Tracking::insert($insert);
						return back()->with('success','Record successfully uploaded.');
					}catch(\Illuminate\Database\QueryException $ex){ 
					  return back()->with('error',$ex->getMessage());
					  // Note any method of class PDOException can be called on $ex.
					}
				}	

			}


		}
		return back()->with('error','Please Check your file, Something is wrong there.');
	}
}

?>