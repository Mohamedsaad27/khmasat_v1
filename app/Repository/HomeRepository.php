<?php

namespace App\Repository;

use App\Models\Property;
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

        return view('front.index', compact('latestProperties', 'featuredProperties'));

    }

    public function search(Request $request)
    {
        $properties = Property::query()->with('propertyType', 'address')
            ->where('title', 'like', '%' . $request->search . '%')
            ->whereHas('address', function ($query) use ($request) {
                $query->where('city', 'like', '%' . $request->search . '%')
                    ->orWhere('governate', 'like', '%' . $request->search . '%')
                    ->orWhere('country', 'like', '%' . $request->search . '%');
            })
            ->whereHas('propertyType', function ($query) use ($request) {
                $query->where('type', 'like', '%' . $request->search . '%');
            })
            ->orWhere('bathroom', 'like', '%' . $request->search . '%')
            ->get();
        return response()->json($properties);
    }

}