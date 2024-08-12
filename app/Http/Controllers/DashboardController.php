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
        $userCount = \App\Models\User::count();
        // $roleCount = \App\Models\Role::count();
        // $permissionCount = \App\Models\Permission::count();
        $bidCount = \App\Models\Bid::count();
        $propertyCount = \App\Models\Property::count();

        // Pass user data to the view if needed
        return view('admin.dashboard', compact('userCount', 'bidCount', 'propertyCount'));
    }
}
