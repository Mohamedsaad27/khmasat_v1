<?php

namespace App\Repository\Web;

use App\Interfaces\PropertiesPageRepositoryInterface;
use App\Models\Address;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertiesPageRepository implements PropertiesPageRepositoryInterface
{
    public function index()
    {
        $properties = Property::query()->with('propertyType', 'category', 'benefits', 'propertyImages', 'address')->paginate(3);

        return view('front.properties', $properties);
    }

    public function getProperties()
    {
        $properties = Property::query()->with('propertyType', 'category', 'benefits', 'propertyImages', 'address')->latest()->paginate(9);
        $addresses = Address::all();
        $categories = Category::all();

        $variables = compact('properties', 'addresses', 'categories');

        return response()->json($properties, 200);
    }
    public function propertyFilter(Request $request)
    {
        try {
            $property = Property::with('propertyType', 'category', 'benefits', 'propertyImages', 'address')->filter($request)->paginate(9);
            if ($property->isEmpty()) {
                return response()->json('لا يوجد عقارات', 404);
            }
            return response()->json($property, 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }
    }
}
