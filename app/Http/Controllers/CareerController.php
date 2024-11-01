<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CareerController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Career::class);
        $filters = request()->only(['search', 'min_salary', 'max_salary', 'experience', 'category']);
        $careers = Career::with('employer')->latest()->filter($filters)->get();

        return view('career.index', ['careers' => $careers]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        Gate::authorize('view', $career);
        return view('career.show', ['career' => $career->load('employer.careers')]);
    }

}
