<?php

namespace App\Repository\Web;
use App\Interfaces\DashboardRepositoryInterface;
use App\Models\Property;
use App\Models\User;

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
        $recentProperties = Property::latest()->take(5)->get();
        return view('admin.index',[
            'properties' => $properties,
            'users' => $users,
            'admins' => $admins,
            'employees' => $employees,
            'availableProperties' => $availableProperties,
            'soldProperties' => $soldProperties,
            'rentedProperties' => $rentedProperties,
            'recentProperties' => $recentProperties,
        ]);
    }
}
