<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class despensesController extends Controller
{
    //
        // Afficher les dépenses
    public function index($colocation_id)
    {
        $colocation = Colocation::findOrFail($colocation_id);
        $despenses = $colocation->despenses;

        return view('despenses.index', compact('colocation', 'despenses'));
    }

    //  Form création
    public function create($colocation_id)
    {
        $colocation = Colocation::findOrFail($colocation_id);

        return view('despenses.create', compact('colocation'));
    }

    // Enregistrer
    public function store(Request $request, $colocation_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        Despense::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'colocation_id' => $colocation_id,
        ]);

        return view('colocationView');
    }

    // Supprimer
    public function destroy($id)
    {
        $despense = Despense::findOrFail($id);
        $despense->delete();

        return back()->with('success', 'Dépense supprimée');
    }

}
