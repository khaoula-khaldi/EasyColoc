<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;

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

        Mail::to($request->email)->send(new InvitationMail($token));

        return back()->with('success', 'Invitation envoyée par email !');

    }

    // Accepter invitation
        public function accept($token){

        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $invitation = Invitation::where('token', $token)->firstOrFail();
        $user = auth()->user();

       

        // Ajouter user à la colocation
        $user->colocations()->attach($invitation->colocation_id, [
            'role' => 'member',
            'joined_at' => now(),
        ]);

        $invitation->delete();

        // Rediriger vers dashboard spécifique
        return redirect()->route('colocation.colocationView', ['id' => $invitation->colocation_id])
            ->with('success', 'Vous avez rejoint la colocation !');
    }
    // Refuser invitation
    public function decline($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();
        $invitation->delete();

        return "Invitation refusée.";
    }
}