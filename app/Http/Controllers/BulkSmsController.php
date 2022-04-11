<?php

namespace App\Http\Controllers;

use Djunehor\Sms\Concrete\BulkSmsNigeria;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
//use Validator;

use Illuminate\Support\Facades\Validator;


class BulkSmsController extends Controller
{
    //login
    public function sendSms( Request $request )
    {
       // Your Account SID and Auth Token from twilio.com/console
       $sid    = env( 'TWILIO_SID' );
       $token  = env( 'TWILIO_TOKEN' );
       $client = new Client( $sid, $token );

       $validator = Validator::make($request->all(), [
           'numbers' => 'required',
           'message' => 'required'

       ]);
       if ( $validator->passes()) {
           $numbers_in_arrays = explode( ',' , $request->input( 'numbers' ) );
           $message = $request->input( 'message' );
           $count = 0;

           foreach( $numbers_in_arrays as $number )
           {
               $count++;

               $client->messages->create(
                   $number,
                   [
                       'from' => env( 'TWILIO_FROM' ),
                       'body' => $message,
                   ]
               );
           }
           return back()->with( 'success', $count . " messages sent!" );

       } else {
           return back()->withErrors( $validator );
       }
   }
   public function  index(){
      //return BulkSms::all();
      return response()->json([]);
   }
   public function store(){
       return response()->json();
   }

}
