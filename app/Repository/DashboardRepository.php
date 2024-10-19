<?php

namespace App\Repository;
use App\Models\User;
use App\Models\Property;
use App\Interfaces\DashboardRepositoryInterface;

class DashboardRepository implements DashboardRepositoryInterface
{

    public function index()
    {
        $properties = Property::count();
        $users = User::where('role', 'user')->count();
        $admins = User::where('role', 'admin')->count();
        $employees = User::where('role', 'employee')->count();
        $availableProperties = Property::where('status', 'available')->count();
        $soldProperties = Property::where('status', 'sold')->count();
        $rentedProperties = Property::where('status', 'rented')->count();
        $recentProperties = Property::with('address')->orderBy('created_at', 'desc')->take(5)->get();    
        return view('admin.index', compact('properties', 'users', 'admins', 'employees', 'availableProperties', 'soldProperties', 'rentedProperties', 'recentProperties'));
    }
}
