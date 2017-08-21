<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IpfFee;
use App\Http\Requests\StoreIPFFee;


class IpfFeesController extends Controller
{
   
   
    public function index()
    {
       return view('admin/maintenance.ipf_fee_index');
    }

  
    public function store(Request $request)
    {
       $ipf_header = new ImportProcessingFeeHeader;
        $ipf_header->dateEffective = $request->dateEffective;
        $ipf_header->save();

        $_minimum = json_decode(stripslashes($request->minimum), true);
        $_maximum = json_decode(stripslashes($request->maximum), true);
        $_amount = json_decode(stripslashes($request->amount), true);


        $tblRowLength = $request->tblLength;

        for($x = 0; $x < $tblRowLength; $x++)
        {
          $ipf_detail = new ImportProcessingFeeDetail;
          $ipf_detail->ipf_headers_id = $ipf_header->id;
          $ipf_detail->minimum = (string)$_minimum[$x];
          $ipf_detail->maximum = (string)$_maximum[$x];
          $ipf_detail->amount = (string)$_amount[$x];
          $ipf_detail->save();
        }
      }

      public function update(StoreIPFFee $request, $id)
      {
          $ipf_fee = IpfFee::findOrFail($id);
        $ipf_fee->minimum = $request->minimum;
        $ipf_fee->maximum = $request->maximum;
        $ipf_fee->amount = $request->amount;
        $ipf_fee->save();

        return $ipf_fee;
    }


    public function update(StoreIPFFee $request, $id)
    {
        $ipf_fee = IpfFee::findOrFail($id);
        $ipf_fee->minimum = $request->minimum;
        $ipf_fee->maximum = $request->maximum;
        $ipf_fee->amount = $request->amount;
        $ipf_fee->save();

        return $ipf_fee;
    }

    
    public function destroy($id)
    {
        $ipf_fee = IpfFee::findOrFail($id);
        $ipf_fee->delete();
    }


     public function reactivate(Request $request)
    {
        $ipf_fee = IpfFee::withTrashed()
        ->where('id',$request->id)
        ->restore();
  
    }

    public function ipf_utilities(){

        return view('admin/utilities.ipf_fee_utility_index');
    }
}
