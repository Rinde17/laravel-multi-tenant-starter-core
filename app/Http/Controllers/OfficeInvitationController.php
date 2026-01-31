<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfficeInvitationRequest;
use App\Models\OfficeInvitation;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OfficeInvitationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfficeInvitationRequest $request)
    {
        $office = auth()->user()->office;

        Gate::authorize('create', [OfficeInvitation::class, $office]);

        OfficeInvitation::create([
            'office_id' => $office->id,
            'email' => $request->email,
            'role' => $request->role,
            'token' => Str::random(32),
            'expires_at' => now()->addDays(7),
        ]);

        return redirect()->route('office.show')
            ->with('status', 'Invitation sent successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfficeInvitation $officeInvitation)
    {
        Gate::authorize('delete', $officeInvitation);

        $officeInvitation->delete();

        return redirect()->back()->with('status', 'Invitation cancelled.');
    }
}
