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

    public function index()
    {
        return $this->propertyRepository->index();
    }

    public function getProperties()
    {
        return $this->propertyRepository->getProperties();
    }
    public function filter(Request $request)
    {
        return $this->propertyRepository->propertyFilter($request);
    }
}
