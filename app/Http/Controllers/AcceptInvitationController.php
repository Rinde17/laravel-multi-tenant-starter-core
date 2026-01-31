<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcceptOfficeInvitationRequest;
use App\Models\OfficeInvitation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AcceptInvitationController extends Controller
{
    public function show(string $token)
    {
        $invitation = OfficeInvitation::where('token', $token)->firstOrFail();

        if ($invitation->isExpired() || $invitation->isAccepted()) {
            return Inertia::render('auth/InvalidInvitation');
        }

        return Inertia::render('auth/RegisterInvitation', [
            'invitation' => $invitation,
        ]);
    }

    public function store(AcceptOfficeInvitationRequest $request)
    {
        $invitation = OfficeInvitation::where('token', $request->token)->firstOrFail();

        if ($invitation->isExpired() || $invitation->isAccepted()) {
            abort(403);
        }

        $user = DB::transaction(function () use ($request, $invitation) {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $invitation->email,
                'password' => Hash::make($request->password),
                'office_id' => $invitation->office_id,
                'email_verified_at' => now(),
            ]);

            setPermissionsTeamId($invitation->office_id);
            $user->assignRole($invitation->role);

            $invitation->update(['accepted_at' => now()]);

            return $user;
        });

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
