<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function show(Request $request, User $user)
    {
        return redirect('/dashboard//'+$user['Admin']);
    }
}
