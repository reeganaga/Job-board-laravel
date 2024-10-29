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
    public function store(Request $request)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
}
