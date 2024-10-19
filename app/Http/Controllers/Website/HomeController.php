<?php

namespace App\Http\Controllers\Website;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Interfaces\HomeInterface;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $homeRepository;
    public function __construct(HomeInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }
    public function handleHomePage()
    {
        return $this->homeRepository->handleHomePage();
    }

    public function search(Request $request)
    {
        return $this->homeRepository->search($request);
    }


}
