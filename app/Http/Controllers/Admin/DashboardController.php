<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\DashboardRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashboardRepository;
    public function __construct(DashboardRepositoryInterface $dashboardRepositoryInterface)
    {
        $this->dashboardRepository = $dashboardRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->dashboardRepository->index();
    }
}
