<?php

namespace App\Http\Controllers;
use App\Models\Colocation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ColocationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

       
        $colocation = Colocation::create([
            'name' => $request->name,
            'status' => 'active',
        ]);

        
        $colocation->users()->attach(auth()->id(), [
            'role' => 'owner',
            'joined_at' => now(),
        ]);

        return view('dashboard');
            
    }
    
    public function view(){
        $colocation = auth()->user()->colocations()->with('users')->first();

        if (!$colocation) {
            // rediriger vers dashboard avec message
            return redirect()->route('dashboard')
                            ->with('message', 'Vous n’avez encore aucune colocation.');
        }
        
        return view('colocation.colocationView', compact('colocation'));
    }
}