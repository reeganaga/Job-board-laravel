<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareerRequest;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB; // Add this import

class MyCareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAnyEmployer', Career::class);

        $careers = auth()->user()->employer
            ->careers()
            ->with(['careerApplications', 'careerApplications.user'])
            ->get();
        return view('my-career.index', ['careers' => $careers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Career::class);
        return view('my-career.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CareerRequest $request)
    {
        Gate::authorize('create', Career::class);

        $validatedData = $request->validate($request->validated());

        auth()->user()->employer->careers()->create($validatedData);

        return redirect()->route('my-careers.index')->with('success', 'Your Job has been created');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $myCareer)
    {
        Gate::authorize('update', $myCareer);
        return view('my-career.edit', ['career' => $myCareer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CareerRequest $request, Career $myCareer)
    {
        Gate::authorize('update', $myCareer);

        $myCareer->update($request->validated());

        return redirect()->route('my-careers.index')->with('success', 'Your Job has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $myCareer)
    {

        $myCareer->delete();

        return redirect()->route('my-careers.index')->with('success', 'Your Job has been deleted');

    }
}
