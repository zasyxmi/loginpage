<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreDayRequest;
use App\Http\Requests\UpdateDayRequest;

class DayController extends Controller
{
    public function index(): View
    {
        $days = Day::latest()->get();

        return view('days.index', compact('days'));
    }

    public function create(): View
    {
        return view('days.create');
    }

    public function store(StoreDayRequest $request): RedirectResponse
{
    Day::create($request->validated());

    return redirect()
        ->route('days.index')
        ->with('success', 'Day created successfully.');
}

    public function show(Day $day): View
    {
        return view('days.show', compact('day'));
    }

    public function edit(Day $day): View
    {
        return view('days.edit', compact('day'));
    }

    public function update(UpdateDayRequest $request, Day $day): RedirectResponse
{
    $day->update($request->validated());

    return redirect()
        ->route('days.index')
        ->with('success', 'Day updated successfully.');
}

    public function destroy(Day $day): RedirectResponse
    {
        $day->delete();

        return redirect()->route('days.index')->with('success', 'Day deleted successfully.');
    }
}