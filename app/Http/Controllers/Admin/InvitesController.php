<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Doorman;

class InvitesController extends Controller
{
    public function indexInvites()
    {
        $invites = DB::table('invites')->paginate(10);

        return view('admin.invites.index', ['invites' => $invites]);
    }

    public function addInvite(Request $request)
    {
        $this->validate($request, [
            'email' => 'nullable|email',
            'expiration' => 'nullable|numeric',
            'amount' => 'required|numeric|min:1|max:50',
            'uses' => 'required|numeric|min:1'
        ]);

        if (isset($request->expiration)) {
            $expiration = Carbon::now('UTC')->addDays($request->expiration);
        } else {
            $expiration = null;
        }

        // If the email address and expiration date are given
        if (isset($request->email) && isset($request->expiration)) {
            Doorman::generate()
                ->for($request->email)
                ->expiresOn($expiration)
                ->times($request->amount)
                ->uses($request->uses)
                ->make();
        } elseif (isset($request->email)) {
            Doorman::generate()
                ->for($request->email)
                ->times($request->amount)
                ->uses($request->uses)
                ->make();
        } elseif (isset($request->expiration)) {
            Doorman::generate()
                ->expiresOn($expiration)
                ->times($request->amount)
                ->uses($request->uses)
                ->make();
        } else {
            Doorman::generate()
                ->times($request->amount)
                ->uses($request->uses)
                ->make();
        }

        return redirect(route('admin.invites'));
    }

    public function removeInvite($id)
    {
        DB::table('invites')->where('id', $id)->delete();

        return redirect(route('admin.invites'));
    }

    public function removeAllInvites()
    {
        $invites = DB::table('invites')->get();

        foreach ($invites as $invite) {
            DB::table('invites')->where('id', $invite->id)->delete();
        }

        return redirect(route('admin.invites'));
    }
}
