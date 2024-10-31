<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyCareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my-career.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my-career.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'location' => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric|min:5000',
            'experience' => 'required|in:' . implode(',', \App\Models\Career::$experience),
            'category' => 'required|in:' . implode(',', \App\Models\Career::$category),
        ]);

        auth()->user()->employer->careers()->create($validatedData);

        return redirect()->route('my-careers.index')->with('success', 'Your Job has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
