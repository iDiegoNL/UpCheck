<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Spatie\PersonalDataExport\Jobs\CreatePersonalDataExportJob;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexProfile()
    {
        return view('auth.settings.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|min:8|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|phone:AUTO,mobile|max:255',
        ]);

        $user = User::find(Auth::id());

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->phone !== Auth::user()->phone) {
            $user->phone_verified = false;
        }

        $user->save();

        return redirect(route('settings.profile'));
    }

    public function indexAccount()
    {
        return view('auth.settings.account');
    }

    public function exportAccount()
    {
        echo 'export';
    }

    public function deleteAccount()
    {
        echo 'delete';
    }

    public function indexPassword()
    {
        return view('auth.settings.password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->current, $user->password)) {
            return back()->with('error', 'Current password does not match');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('settings.password'));
    }

    public function indexMFA()
    {
        return view('auth.settings.2fa.index');
    }

    public function exportPersonalData()
    {
        dispatch(new CreatePersonalDataExportJob(Auth::user()));
    }
}
