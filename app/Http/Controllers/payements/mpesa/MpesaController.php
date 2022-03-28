<?php

namespace App\Http\Controllers\payements\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MpesaController extends Controller
{
    //

    public function getAccessToken(){

    $url= env('MPESA_ENV') ==0
    ?'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
    :'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

    $curl=curl_init($url);
    curl_setopt_array(
        $curl,
        array(
          CURLOPT_HTTPHEADER => ['Content-Type:Application.json;charset:utf8'],
          CURLOPT_RETURNTRANSFER =>true,
          CURLOPT_HEADER =>false,
          CURLOPT_USERPWD => env ('MPESA_CONSUER_KEY') .':'.env('MPESA_SECRET_KEY')

        )
    );
    $response = json_decode(curl_exec($curl));
     \curl_close($curl);

     return $response;



    }
}
