<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Pass user data to the view if needed
        return view('dashboard', compact('user'));
    }
}
