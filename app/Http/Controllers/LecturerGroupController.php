<?php

namespace App\Http\Controllers;

use App\Models\LecturerGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;

class LecturerGroupController extends Controller
{
public function index(): View
{
    $groups = LecturerGroup::latest()->get();

    return view('groups.index', compact('groups'));
}

    public function create(): View
    {
        return view('groups.create');
    }

    public function store(StoreGroupRequest $request): RedirectResponse
{
    LecturerGroup::create($request->validated());

    return redirect()
        ->route('groups.index')
        ->with('success', 'Group created successfully.');
}

    public function show(LecturerGroup $group): View
    {
        return view('groups.show', compact('group'));
    }

    public function edit(LecturerGroup $group): View
    {
        return view('groups.edit', compact('group'));
    }

    public function update(UpdateGroupRequest $request, LecturerGroup $group): RedirectResponse
{
    $group->update($request->validated());

    return redirect()
        ->route('groups.index')
        ->with('success', 'Group updated successfully.');
}

    public function destroy(LecturerGroup $group): RedirectResponse
    {
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }
}