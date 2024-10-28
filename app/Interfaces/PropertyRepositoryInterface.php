<?php

namespace App\Interfaces;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\Property\StorePropertyRequest;
use App\Http\Requests\Property\UpdatePropertyRequest;
use App\Models\PropertyImage;

interface PropertyRepositoryInterface
{
    public function index();
    public function create();
    public function store(StorePropertyRequest $request);
    public function show(Property $property);
    public function edit(Property $property);
    public function update(UpdatePropertyRequest $request, Property $property);
    public function destroy(Property $property);
    public function showPropertyInDashboard(Property $property);
    public function deleteImage(PropertyImage $image);
}
