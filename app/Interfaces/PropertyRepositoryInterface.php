<?php

namespace App\Interfaces;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\Property\StorePropertyRequest;
use App\Http\Requests\Property\UpdatePropertyRequest;

interface PropertyRepositoryInterface
{
    public function index();
    public function createProperty();
    public function storeProperty(StorePropertyRequest $request);
    public function showPropertyDetails(Property $property);
    public function editProperty(Property $property);
    public function updateProperty(UpdatePropertyRequest $request);
    public function deleteProperty(Property $property);
}
