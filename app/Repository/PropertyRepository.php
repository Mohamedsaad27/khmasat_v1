<?php

namespace App\Repository;

use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Interfaces\PropertyRepositoryInterface;
use App\Http\Requests\Property\StorePropertyRequest;
use App\Http\Requests\Property\UpdatePropertyRequest;
use Illuminate\Support\Facades\Auth;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function index()
    {
        return view('admin.property.index');
    }

    public function create()
    {
        $benefits = DB::table('benefits')->get();
        $propertyTypes = DB::table('property_types')->get();
        return view('admin.property.create', compact('benefits', 'propertyTypes'));
    }
    public function store(StorePropertyRequest $request)
    {
        $validatedData = $request->validated();
        try {
            DB::beginTransaction();
            $property = Property::create([
                'category_id' => $validatedData['category_id'],
                'user_id' => Auth::user()->id,
                'type_id' => $validatedData['property_type_id'],
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title']),
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'price_after_dicount' => $validatedData['price_after_dicount'] ?? null,
                'installment_amount' => $validatedData['installment_amount'] ?? null,
                'bedroom' => $validatedData['bedroom'],
                'bathroom' => $validatedData['bathroom'],
                'area' => $validatedData['area'],
                'status' => $validatedData['status'],
                'furnished' => $validatedData['furnished'] ?? false,
            ]);
            $property->attributes()->attach($validatedData['attributes']);
            $property->benefits()->attach($validatedData['benefits']);
            DB::commit();
            return redirect()->route('admin.properties.index')->with('success', 'Property created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create property');
        }
    }
    public function show(Property $property)
    {

    }
    public function edit(Property $property)
    {
        $benefits = DB::table('benefits')->get();
        $propertyTypes = DB::table('property_types')->get();

        return view('admin.property.edit', compact('property', 'benefits', 'propertyTypes'));
    }
    public function update(UpdatePropertyRequest $request)
    {

    }
    public function destroy(Property $property)
    {

    }
}