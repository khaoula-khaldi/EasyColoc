<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colocation;
use App\Models\Despense;

class DespensesController extends Controller
{
    public function create($colocation_id)
    {
        $colocation = Colocation::findOrFail($colocation_id);
        return view('despenses.create', compact('colocation'));
    }


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

        return redirect()->route('colocationView');
    }
}