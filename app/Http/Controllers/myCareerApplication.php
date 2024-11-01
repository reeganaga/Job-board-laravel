<?php

namespace App\Http\Controllers;

use App\Models\CareerApplication;
use Illuminate\Http\Request;

class myCareerApplication extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my-job-application.index', [
            'applications' => auth()->user()->careerApplications()->with(
                [
                    'career' => fn($query) => $query->withAvg('careerApplications', 'expected_salary')->withCount('careerApplications')->withTrashed(),
                    'career.employer'
                ]
            )->latest()->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareerApplication $myCareerApplication)
    {
        $myCareerApplication->delete();

        return redirect()->route('my-career-applications.index')->with('success', 'Your application is canceled');
    }
}
