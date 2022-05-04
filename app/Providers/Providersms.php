<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Twilio\Rest\Client;

class Providersms extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        dd("estou aqui");
        // $account_sid = getenv('TWILIO_SID');
        // $auth_token = getenv('TWILIO_AUTH_TOKEN');
        // $twilio_number = getenv('TWILIO_NUMBER');

        // $account_sid = getenv('APP_NAME');
        // $auth_token = ENV('TWILIO_AUTH_TOKEN');
        // $twilio_number = ENV('TWILIO_NUMBER');

        // $account_sid ='ACbba2658a53e19e441af50df601f29b8b';
        // $auth_token = 'dfd7809b888d9eeb3f2961faa659fa36';
        // $twilio_number = '+14785004950';

        // // dd($account_sid);

        // $client = new Client($account_sid, $auth_token);
        // $client->messages->create($receptor,
        //     ['from' => $twilio_number, 'body' => $mensagem] );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
