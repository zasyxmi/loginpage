<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Hall;
use App\Models\LecturerGroup;
use App\Models\Subject;
use App\Models\Timetable;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreTimetableRequest;
use App\Http\Requests\UpdateTimetableRequest;

class TimetableController extends Controller
{
    public function index(): View
    {
        $timetables = Timetable::with(['student', 'subject', 'day', 'hall', 'lecturerGroup'])
            ->latest()
            ->get();

        return view('timetables.index', compact('timetables'));
    }

public function create(): View
{
    return view('timetables.create', [
        'subjects' => Subject::orderBy('subject_name')->get(),
        'days' => Day::orderBy('day_name')->get(),
        'halls' => Hall::orderBy('lecture_hall_name')->get(),
        'groups' => LecturerGroup::orderBy('name')->get(),
    ]);
}

    public function store(StoreTimetableRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $conflict = Timetable::where('hall_id', $validated['hall_id'])
            ->where('day_id', $validated['day_id'])
            ->where(function ($query) use ($validated) {
                $query->where('time_from', '<', $validated['time_to'])
                    ->where('time_to', '>', $validated['time_from']);
            })
            ->exists();

        if ($conflict) {
            return back()
                ->with('error', 'This hall is already booked at the selected time.')
                ->withInput();
        }

        Timetable::create($validated);

        return redirect()
            ->route('timetables.index')
            ->with('success', 'Timetable entry created successfully.');
    }

    public function show(Timetable $timetable): View
    {
        $timetable->load(['student', 'subject', 'day', 'hall', 'lecturerGroup']);

        return view('timetables.show', compact('timetable'));
    }

    public function edit(Timetable $timetable): View
    {
        return view('timetables.edit', [
            'timetable' => $timetable,
            
            'subjects' => Subject::orderBy('subject_name')->get(),
            'days' => Day::orderBy('day_name')->get(),
            'halls' => Hall::orderBy('lecture_hall_name')->get(),
            'groups' => LecturerGroup::orderBy('name')->get(),
        ]);
    }

    public function update(UpdateTimetableRequest $request, Timetable $timetable): RedirectResponse
    {
        $validated = $request->validated();

        $conflict = Timetable::where('hall_id', $validated['hall_id'])
            ->where('day_id', $validated['day_id'])
            ->where('id', '!=', $timetable->id)
            ->where(function ($query) use ($validated) {
                $query->where('time_from', '<', $validated['time_to'])
                    ->where('time_to', '>', $validated['time_from']);
            })
            ->exists();

        if ($conflict) {
            return back()
                ->with('error', 'This hall is already booked at the selected time.')
                ->withInput();
        }

        $timetable->update($validated);

        return redirect()
            ->route('timetables.index')
            ->with('success', 'Timetable entry updated successfully.');
    }

    public function destroy(Timetable $timetable): RedirectResponse
    {
        $timetable->delete();

        return redirect()->route('timetables.index')->with('success', 'Timetable entry deleted successfully.');
    }
}