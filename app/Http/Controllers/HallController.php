<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;

class HallController extends Controller
{
    public function index(): View
    {
        $halls = Hall::oldest()->get();

        return view('halls.index', compact('halls'));
    }

    public function create(): View
    {
        return view('halls.create');
    }

    public function store(StoreHallRequest $request): RedirectResponse
{
    Hall::create($request->validated());

    return redirect()
        ->route('halls.index')
        ->with('success', 'Hall created successfully.');
}

    public function show(Hall $hall): View
    {
        return view('halls.show', compact('hall'));
    }

    public function edit(Hall $hall): View
    {
        return view('halls.edit', compact('hall'));
    }

   public function update(UpdateHallRequest $request, Hall $hall): RedirectResponse
{
    $hall->update($request->validated());

    return redirect()
        ->route('halls.index')
        ->with('success', 'Hall updated successfully.');
}

    public function destroy(Hall $hall): RedirectResponse
    {
        $hall->delete();

        return redirect()->route('halls.index')->with('success', 'Hall deleted successfully.');
    }
}
