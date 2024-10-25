<?php

namespace App\Repository\Web;

use App\Models\Address;
use App\Models\Category;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Interfaces\HomeInterface;

class HomeRepository implements HomeInterface
{
    public function handleHomePage()
    {
        $featuredProperties = Property::query()->with('propertyType', 'address', 'propertyImages')
            ->where('feature', 1)
            ->orderBy('price', 'desc')
            ->latest()
            ->take(5)
            ->get();

        $latestProperties = Property::query()->with('propertyType', 'address', 'propertyImages')
            ->latest()
            ->take(9)
            ->get();

        $categories = Category::all();

        $propertyTypes = PropertyType::all();

        $addresses = Address::all();

        return view('front.index', compact('latestProperties', 'featuredProperties', 'categories', 'propertyTypes', 'addresses'));

    }
    public function search(Request $request)
    {
        $properties = Property::query()
            ->with(['propertyType', 'address', 'propertyImages'])
            ->when($request->searchText, function ($query) use ($request) {
                $searchText = $request->searchText;
                $query->whereHas('address', function ($q) use ($searchText) {
                    $q->where('country', 'like', '%' . $searchText . '%')
                      ->orWhere('governorate', 'like', '%' . $searchText . '%')
                      ->orWhere('city', 'like', '%' . $searchText . '%');
                });
            })
            ->when($request->get('property-type'), function ($query) use ($request) {
                $query->whereHas('propertyType', function ($q) use ($request) {
                    $q->where('id', $request->get('property-type'));  // Filter by property type
                });
            })
            ->when($request->bedroom, function ($query) use ($request) {
                $query->where('bedroom', $request->bedroom);  // Filter by number of bedrooms
            })
            ->dd();
    
        return view('front.properties', compact('properties'));
    }
    



}