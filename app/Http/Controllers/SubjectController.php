<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    public function index(): View
    {
        $subjects = Subject::withCount('timetables')->oldest()->get();

        return view('subjects.index', compact('subjects'));
    }

    public function create(): View
    {
        return view('subjects.create');
    }

    public function store(StoreSubjectRequest $request): RedirectResponse
{
    Subject::create($request->validated());

    return redirect()
        ->route('subjects.index')
        ->with('success', 'Subject created successfully.');
}

    public function show(Subject $subject): View
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject): View
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(UpdateSubjectRequest $request, Subject $subject): RedirectResponse
{
    $subject->update($request->validated());

    return redirect()
        ->route('subjects.index')
        ->with('success', 'Subject updated successfully.');
}

    public function destroy(Subject $subject): RedirectResponse
    {
        $subject->timetables()->delete();
        $subject->delete();

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject and related timetable entries deleted successfully.');
    }
}
