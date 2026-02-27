<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public function create($colocationId)
    {
        return view('invitation.create', compact('colocationId'));
    }

    public function store(Request $request, $colocationId)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = Str::random(32);

        Invitation::create([
            'email' => $request->email,
            'token' => $token,
            'colocation_id' => $colocationId,
        ]);

        return back()->with('success', 'Invitation envoyée !');
    }

    // Accepter invitation
    public function accept($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();
        $user = auth()->user();
        $user->colocation_id = $invitation->colocation_id;
        $user->save();
        $invitation->delete();

        return "Vous avez rejoint la colocation !";
    }

    // Refuser invitation
    public function decline($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();
        $invitation->delete();

        return "Invitation refusée.";
    }
}