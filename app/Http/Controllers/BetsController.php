<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBetsRequest;
use App\Http\Requests\UpdateBetsRequest;
use App\Models\Bets;
use Illuminate\Http\Request;

class BetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bets = Bets::all();

        return view('bets.index', ['bets' => $bets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBetsRequest $request)
    {
        $request->validate([
            'user' => 'required|string|unique:bets,user',
            'hour' => ['required', 'regex:/^\d{2}:\d{2}$/'],
        ]);
    
        // Crie a aposta
        Bets::create([
            'user' => $request->user,
            'hour' => $request->hour,
        ]);
    
        return redirect()->route('bets.index')->with('success', 'Aposta criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bets $bets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bets $bet)
    {
        return view('bets.edit', compact('bet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBetsRequest $request, Bets $bet)
    {
        $bet->update($request->validated());

        return redirect()->route('bets.index')->with('success', 'Aposta criada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $deleted = Bets::destroy($id);

        if ($deleted) {
            return redirect()->route('bets.index')->with('success', 'Aposta excluída com sucesso.');
        } else {
            return redirect()->route('bets.index')->with('error', 'Erro ao excluir a aposta.');
        }
    }
}