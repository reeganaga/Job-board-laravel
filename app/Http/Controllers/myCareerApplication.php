<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myCareerApplication extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my-job-application.index', [
            'applications' => auth()->user()->careerApplications()->with('career','career.employer')->latest()->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}