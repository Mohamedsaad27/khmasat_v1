<?php

namespace App\Repository;
use App\Interfaces\DashboardRepositoryInterface;

class DashboardRepository implements DashboardRepositoryInterface
{

    public function index()
    {
        return view('admin.index');
    }
}