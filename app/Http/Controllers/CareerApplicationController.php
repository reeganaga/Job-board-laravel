<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerApplicationController extends Controller
{
    public function create(Career $career)
    {
        return view('application.create', ['career' => $career]);
    }
    public function store(Career $career, Request $request)
    {
        $career->careerApplications()->create([
            'user_id' => $request->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|min:1|max:1000000'
            ])
        ]);

        return redirect()->route('careers.show', $career)->with('success', 'Career application submitted');
    }
    public function destroy(string $id)
    {
        //
    }
}
