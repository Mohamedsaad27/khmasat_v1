<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Property\StorePropertyRequest;
use App\Http\Requests\Property\UpdatePropertyRequest;
use App\Interfaces\PropertyRepositoryInterface;
use App\Models\Property;
use App\Models\PropertyImage;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    protected $propertyRepository;
    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->propertyRepository->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->propertyRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        return $this->propertyRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return $this->propertyRepository->show($property);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return $this->propertyRepository->edit($property);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        return $this->propertyRepository->update($request, $property);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        return $this->propertyRepository->destroy($property);
    }

    public function showPropertyInDashboard(Property $property)
    {
        return $this->propertyRepository->showPropertyInDashboard($property);
    }

    public function deleteImage(PropertyImage $image)
    {
        return $this->propertyRepository->deleteImage($image);
    }

}
