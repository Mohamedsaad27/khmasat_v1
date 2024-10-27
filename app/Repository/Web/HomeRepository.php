<?php

namespace App\Repository\Web;

use App\Models\Address;
use App\Models\Category;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Builder;
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
        $properties = Property::with(['address', 'category', 'propertyType'])
            ->filter($request)
            ->when($request->filled('address'), function (Builder $query) use ($request) {
                $address = $request->input('address');

                // Split the address string by " - "
                $addressParts = explode(' - ', $address);

                $query->whereHas('address', function (Builder $query) use ($addressParts) {
                    // If we have country
                    if (isset($addressParts[0]) && !empty($addressParts[0])) {
                        $query->where('country', 'like', '%' . trim($addressParts[0]) . '%');
                    }

                    // If we have governorate
                    if (isset($addressParts[1]) && !empty($addressParts[1])) {
                        $query->where('governorate', 'like', '%' . trim($addressParts[1]) . '%');
                    }

                    // If we have city
                    if (isset($addressParts[2]) && !empty($addressParts[2])) {
                        $query->where('city', 'like', '%' . trim($addressParts[2]) . '%');
                    }
                    if (isset($addressParts[0]) && !isset($addressParts[1]) && !isset($addressParts[2])) {
                        $query->where('country', 'like', '%' . trim($addressParts[0]) . '%');
                        $query->orWhere('governorate', 'like', '%' . trim($addressParts[0]) . '%');
                        $query->orWhere('city', 'like', '%' . trim($addressParts[0]) . '%');
                    }
                });
            })
            ->when($request->filled('category'), function (Builder $query) use ($request) {
                $query->whereHas('category', function (Builder $query) use ($request) {
                    $query->where('name', 'like', '%' . trim($request->input('category')) . '%');
                });
            })
            ->when($request->filled('type'), function (Builder $query) use ($request) {
                $query->whereHas('propertyType', function (Builder $query) use ($request) {
                    $query->where('type', 'like', '%' . trim($request->input('type')) . '%');
                });
            })
            ->when($request->filled('bedroom'), function (Builder $query) use ($request) {
                $query->where('bedroom', 'like', '%' . trim($request->input('bedroom')) . '%');
            })
            ->latest()
            ->paginate(12);

        return response()->json([
            'success' => true,
            'data' => $properties,
        ]);
    }

}
