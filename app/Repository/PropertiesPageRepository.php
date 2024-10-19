<?php

namespace App\Repository;

use App\Interfaces\PropertiesPageRepositoryInterface;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertiesPageRepository implements PropertiesPageRepositoryInterface
{
    public function getProperties()
    {
        $properties = Property::query()->with('propertyType', 'category', 'benefits', 'propertyImages', 'address')->paginate(3);
        return $properties;
    }
    public function propertyFilter(Request $request)
    {
        try {
            $property = Property::with('address','propertyType')->filter($request)->paginate(15);
            if($property->isEmpty()){
                return response()->json(['لا يوجد عقارات'],404);
            }
            return response()->json([$property]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }
    }
}
