<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOfficeRequest;
use App\Models\Office;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class OfficeController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
        Gate::authorize('manage', auth()->user()->office);

        $office = auth()->user()->office;
        /*
        $members = $office->users()->with('roles')->get()->map(function ($user) use ($office) {
            $user->role = $office->owner_id === $user->id
                ? 'Owner'
                : ($user->getRoleNames()->first() ?? 'Member');
            return $user;
        });
        */
        $members = $office->users()->with('roles')->get()->map(function ($user) {
            $user->role = $user->getRoleNames()->first();
            return $user;
        });
        $invitations = $office->invitations;

        return Inertia::render('office/Index', [
            'userOffice' => $office,
            'members' => $members,
            'invitations' => $invitations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfficeRequest $request, Office $office)
    {
        Gate::authorize('manage', $office);

        $office->update($request->validated());

        return redirect()->route('office.show');
    }
}
