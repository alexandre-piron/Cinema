<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cinema;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        $cinema=$request->user()->cinema;
        return view('dashboard',compact('cinema'));
    }
}
