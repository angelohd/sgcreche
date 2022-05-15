<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class Controllersms extends Controller
{
    //funcao para enviar sms
    function enviasms($mensagem, $receptor)
    {
        //  dd("estou aqui");
        // $account_sid = getenv('TWILIO_SID');
        // $auth_token = getenv('TWILIO_AUTH_TOKEN');
        // $twilio_number = getenv('TWILIO_NUMBER');

        // $account_sid = getenv('APP_NAME');
        // $auth_token = ENV('TWILIO_AUTH_TOKEN');
        // $twilio_number = ENV('TWILIO_NUMBER');

        $account_sid = 'ACbba2658a53e19e441af50df601f29b8b';
        $auth_token = 'ac4789440c2dc67dcacc7939c69fa900';
        $twilio_number = '+14785004950';

        // dd($account_sid);

        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $receptor,
            ['from' => $twilio_number, 'body' => $mensagem]
        );
    }

    function viawathisapp($mensagem, $receptor)
    {
        $account_sid = 'ACbba2658a53e19e441af50df601f29b8b';
        $auth_token = 'ac4789440c2dc67dcacc7939c69fa900';
        $twilio_number = '+14785004950';

        // dd($account_sid);

        $client = new Client($account_sid, $auth_token);

        $client->messages->create(
            'whatsapp:'.$receptor,
            ['from' => 'whatsapp:'.$twilio_number, 'body' => $mensagem]
        );

        // $client->messages
        //     ->create(
        //         "whatsapp:+244928058564", // to
        //         array(
        //             "from" => "whatsapp:+14155238886",
        //             "body" => "Hello! This is an editable text message. You are free to change it and write whatever you like."
        //         )
        //     );
    }
}
