<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class NotificationController extends Controller
{
  //

  public function index(){
      return response()->json();
  }
    public function SendSmsNotification()
    {

        $basic  = new \Vonage\Client\Credentials\Basic("2cfbae65", "JRHb3PwFhcpGH9SM");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("254706047229","Tonny", 'Tonny Systems')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }

    }
}