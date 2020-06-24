<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmailValidator extends Controller
{
    //



	/**
     * check if email is valid from mailboxlayer.com API register to get the key
     * @param Request $request
     */
    public function checkEmailValidity(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->get('email');

        $accessKey = "e947865811932f63e68fadfd9458b08b";

        $response = $client->post('http://apilayer.net/api/check?access_key='. $accessKey. '&email='.$email. '&format=1');

        return $response->getBody();




    }
}
