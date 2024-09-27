<?php

namespace App\Repository;

use App\Http\Requests\Property\StorePropertyRequest;
use App\Http\Requests\Property\UpdatePropertyRequest;
use App\Interfaces\PropertyRepositoryInterface;
use App\Models\Property;
use Illuminate\Support\Facades\DB;

class PropertyRepositoryRepository implements PropertyRepositoryInterface
{
    public function index(){

    }
    public function createProperty(){
        $attributes = DB::table('attributes')->get();
        $benefits = DB::table('benefits')->get();
        return view('admin.property.create', compact('attributes', 'benefits'));
    }
    public function StoreProperty(StorePropertyRequest $request){

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
