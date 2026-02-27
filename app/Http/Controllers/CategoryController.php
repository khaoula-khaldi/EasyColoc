<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function create($colocation_id){
    
        $colocation = Colocation::with('users')->findOrFail($colocation_id);

        if (!$colocation->isOwner()) {
            abort(403); 
        }
        return view('categories.create', compact('colocation'));
    }


    public function store(Request $request, $colocation_id)
    {
        $colocation = Colocation::findOrFail($colocation_id);

        if (!$colocation->isOwner()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $colocation->categories()->create([
            'title' => $request->title,
        ]);


        return redirect()->route('colocationView', $colocation->id)
                         ->with('success', 'Catégorie créée avec succès !');
    }
}