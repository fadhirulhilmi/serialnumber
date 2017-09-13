<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SerialNumberController extends Controller
{
    public function index()
    {

    	$serialFrom = "";
    	$serialTo = "";
    	$fixNumber = "";

    	return view('serialnumber', [
    		'serial_from' => $serialFrom,
    		'serial_to' => $serialTo,
    		'fix_number' => $fixNumber
    	]);
    }

    public function calculateSerialNumber(Request $request)
    {
    	/*$this->validate($request, [

    		'serialfrom' => 'required',
    		'serialto' => 'required'

    	]);*/

    	$serialFrom = $request->serial_from;
    	$serialTo = $request->serial_to;

    	$totalSerialFrom = strlen($serialFrom);
    	$totalSerialTo = strlen($serialTo);

    	$flag = 0;
		$fixNumber = "";
		$startNum = 0;

    	for($i=0; $i<$totalSerialFrom; $i++)
    	{
    		if($serialFrom[$i] == $serialTo[$i] && $flag == 0)
    		{
    			$fixNumber .= $serialFrom[$i];
    			$startNum = $i;
    		}
    		else{
    			$flag = 1;
    		}
    	}

    	$changeSerialFrom = substr($serialFrom, $startNum + 1, $totalSerialFrom);
    	$changeSerialTo = substr($serialTo, $startNum + 1, $totalSerialTo);

    	return view('serialnumber', [
    		'serial_from' => $changeSerialFrom,
    		'serial_to' => $changeSerialTo,
    		'fix_number' => $fixNumber
    	]);
    }
}
