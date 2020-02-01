<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Authy\AuthyApi;
use App\Http\Controllers\Controller;

class TwilioController extends Controller
{
    protected $authy;
    protected $sid;
    protected $authToken;
    protected $twilioFrom;

    public function __construct()
    {
        // Initialize the Authy API and the Twilio Client
        $this->authy = new AuthyApi(config('app.twilio')['AUTHY_API_KEY']);
        // Twilio credentials
        $this->sid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $this->authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $this->twilioFrom = config('app.twilio')['TWILIO_PHONE'];
    }

    public function verifyPhone(Request $request)
    {
        // Validate form input
        $this->validate($request, [
            'country_code' => 'required|string|max:3',
            'phone' => 'required|string|max:10',
            'via' => 'required|string'
        ]);

        //Call the "phoneVerification" method from the Authy API and pass the phone number, country code and verification channel(whether sms or call) as parameters to this method.
        $response = $this->authy->phoneVerificationStart($request->phone, $request->country_code, $request->via);

        if ($response->ok()) {
            print $response->message();
        } else {
            print $response->message();
        }
    }

    public function verifyCode(Request $request)
    {
        // Call the method responsible for checking the verification code sent.
        $response = $this->authy->phoneVerificationCheck($request->phone, $request->country_code, $request->code);
        if ($response->ok()) {
            print $response->message();
        } else {
            print $response->message();
        }
    }

    public function sendSMS(Request $request)
    {
        // Validate User input from form.
        $this->validate($request, [
            'phone' => 'required|string',
            'message' => 'required|string'
        ]);

        // Create REST API Client
        $client = new Client($this->sid, $this->authToken);

        try {
            $sms = $client->messages->create(
                $request->phone,
                [
                    'from' => $this->twilioFrom,
                    'body' => $request->message
                ]
            );

            if ($sms) {
                return redirect()->back()->with('success', 'SMS sent successfully');
            } else {
                return redirect()->back()->with('error', 'SMS failed!');
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
