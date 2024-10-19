<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PropertiesPageRepositoryInterface;

class PropertiesPageController extends Controller
{
    protected $propertyRepository;

    public function __construct(PropertiesPageRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    public function getProperties()
    {
        $properties = $this->propertyRepository->getProperties();
        return view('front.properties', compact('properties'));
    }
    public function filter(Request $request)
    {
        return $this->propertyRepository->propertyFilter($request);
    }
}
