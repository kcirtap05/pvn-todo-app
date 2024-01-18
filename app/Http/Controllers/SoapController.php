<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
class SoapController extends Controller
{
    //

    public function getCountry (){
        
        try {
         
            $client = new SoapClient('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL');
            $result = $client->CountryName (['sCountryISOCode' => 'AF']); 
            return response()->json([
                'StatusCode'=> 1,
                'StatusDescription'=> 'success',
                'body'=> $result
            ], 200);
        }
        catch (\Exception $e) 
        {
            return response()->json([
                'StatusCode'=> 0,
                'StatusDescription'=> 'error',
                'body'=> $e
            ], 200);
        }
    }
}
