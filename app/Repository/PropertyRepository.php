<?php

namespace App\Repository;

use App\Http\Requests\Property\StorePropertyRequest;
use App\Http\Requests\Property\UpdatePropertyRequest;
use App\Interfaces\PropertyRepositoryInterface;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class PropertyRepository implements PropertyRepositoryInterface
{
    public function index(){

    }
    public function createProperty(){
        $attributes = DB::table('attributes')->get();
        $benefits = DB::table('benefits')->get();
        $propertyTypes = DB::table('property_types')->get();
        return view('admin.property.create', compact('attributes', 'benefits', 'propertyTypes'));
    }
    public function storeProperty(StorePropertyRequest $request){
        dd($request->all());
        $validatedData = $request->validated();
        dd($validatedData);
        DB::beginTransaction();
        try {
            $property = Property::create($validatedData);
            $property->attributes()->attach($validatedData['attributes']);
            $property->benefits()->attach($validatedData['benefits']);
            DB::commit();
            return redirect()->route('admin.properties.index')->with('success', 'Property created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create property');
        } 
    }
    public function showPropertyDetails(Property $property){

    }
    public function editProperty(Property $property){

    }
    public function updateProperty(UpdatePropertyRequest $request){

    }
    public function deleteProperty(Property $property){

    }
}
