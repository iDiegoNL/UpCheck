<?php

namespace App\Http\Controllers\Auth;

use Brick\PhoneNumber\PhoneNumberParseException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Twilio\Rest\Client;
use Authy\AuthyApi;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Brick\PhoneNumber\PhoneNumber;

class PhoneVerificationController extends Controller
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

        $this->middleware('auth');
    }

    public function index()
    {
        $sent = false;

        if (Auth::user()->phone == null) {
            return redirect(route('settings.profile'));
        } else {
            return view('auth.settings.confirm-phone')->with('sent', $sent);
        }
    }

    /**
     * @param Request $request
     * @return Factory|View
     * @throws PhoneNumberParseException
     * @throws ValidationException
     */
    public function sendCode(Request $request)
    {
        // Validate form input
        $this->validate($request, [
            'via' => 'required|string'
        ]);

        //Call the "phoneVerification" method from the Authy API and pass the phone number, country code and verification channel(whether sms or call) as parameters to this method.
        $response = $this->authy->phoneVerificationStart(PhoneNumber::parse(Auth::user()->phone)->getNationalNumber(), PhoneNumber::parse(Auth::user()->phone)->getCountryCode(), $request->via);

        if ($response->ok()) {
            flash('The verification code has been sent, please enter it below.')->success();
            $sent = true;
        } else {
            flash('Something went wrong: ' . $response->message())->error();
            $sent = false;
        }

        return view('auth.settings.confirm-phone')->with('sent', $sent);
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|Redirector|View
     * @throws PhoneNumberParseException
     */
    public function verifyCode(Request $request)
    {
        // Call the method responsible for checking the verification code sent.
        $response = $this->authy->phoneVerificationCheck(PhoneNumber::parse(Auth::user()->phone)->getNationalNumber(), PhoneNumber::parse(Auth::user()->phone)->getCountryCode(), $request->code);
        if ($response->ok()) {

            $user = User::find(Auth::id());
            $user->phone_verified = true;
            $user->save();

            return redirect(route('settings.mfa'));
        } else {
            $sent = false;
            flash('Something went wrong: ' . $response->message())->error();
            return view('auth.settings.confirm-phone')->with('sent', $sent);
        }
    }
}
