<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PropertiesPageRepositoryInterface
{
    public function index();
    public function getProperties();
    public function propertyFilter(Request $request);

}
