<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CareerApplicationController extends Controller
{
    public function create(Career $career)
    {

        Gate::authorize('apply', $career);
        return view('application.create', ['career' => $career]);
    }
    public function store(Career $career, Request $request)
    {
        $authorizeData = $request->validate([
            'expected_salary' => 'required|min:1|max:1000000',
            'cv' => 'file|required|mimes:pdf|max:2048'
        ]);

        $file = $request->file('cv');

        $path = $file->store('cvs', 'private');

        Gate::authorize('apply', $career);
        $career->careerApplications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $authorizeData['expected_salary'],
            'cv_path' => $path
        ]);

        return redirect()->route('careers.show', $career)->with('success', 'Career application submitted');
    }
    public function destroy(string $id)
    {
        //
    }
}
