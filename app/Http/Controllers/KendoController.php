<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tracking;
use DB;

class KendoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('kendo.index');
    }

    public function viewlist()
    {                   

        $json = array();  
        $sort='';            
//$_GET['page'];//get page
//$_GET['take']; //page count
        if( isset($_GET['sort']) ){
            $sort = "order by {$_GET['sort'][0]['field']} {$_GET['sort'][0]['dir']}";
        }/*else{
            $sort = "{$model}.id DESC";
        }*///if( isset($this->request->query['sort']) )

        #filter   
        $conditions = '';          
        if(isset($_GET['filter']['filters'])){              
            foreach($_GET['filter']['filters'] as $filter){ 
            
                switch($filter['operator']){
                    case 'eq':{
                        $conditions .= "and {$filter['field']} = '{$filter['value']}' ";
                    }break;
                    case 'contains':{
                        $conditions .= "and {$filter['field']} LIKE '%{$filter['value']}%' ";
                    }break;
                    case 'inn':{
                        //$xplode = explode
                        $conditions .= "and {$filter['field']} IN ({$filter['value']}) ";
                    }break;
                    case 'gte':{
                        $conditions .= "and {$filter['field']} >= '{$filter['value']}' ";
                    }break;
                    case 'lte':{
                        $conditions .= "and {$filter['field']} <= '{$filter['value']}' ";
                    }break;
                }
                
            }                
        }

        $query = "Select * from joblist_hdr where 1 {$conditions} limit {$_GET['take']}";
        $list = DB::select("Select * from joblist_hdr where 1 {$conditions} {$sort} limit {$_GET['skip']},{$_GET['take']} ");//

        $list_count = DB::select("Select * from joblist_hdr where 1 {$conditions}");//
        $count = count($list_count);
//return print_r($list);
        foreach ($list as $value) {
          //  return print_r($value);
            $json[] = array(
                        "tdn"    => $value->tdn,
                        "shipper"         => $value->shipper,
                        "status"       => $value->status
                    );
        }
        

      /*   $json[] = array(
                        "stock_code"    => 'stock_code2',
                        "price"         => 'price2',
                        "pamount"       => '200'
                    );*/
     //   return print_r($_GET['filter']['filters']); //get filters
        return response()->json(array("data"=> $json, "total" => $count ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
