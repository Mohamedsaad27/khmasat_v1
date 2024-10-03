<?php

namespace App\Repository;

use GuzzleHttp\Client;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PropertyRepositoryInterface;
use App\Http\Requests\Property\StorePropertyRequest;
use App\Http\Requests\Property\UpdatePropertyRequest;

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
        $categories = DB::table('categories')->get();
        return view('admin.property.create', compact('benefits', 'propertyTypes', 'categories'));
    }
    public function store(StorePropertyRequest $request)
    {
        $validatedData = $request->validated();
        try {
            DB::beginTransaction();
            $property = Property::create([
                'user_id' => 1,
                'category_id' => $validatedData['category_id'],
                'type_id' => $validatedData['property_type_id'],
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title']),
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'installment_amount' => $validatedData['installment_amount'] ?? null,
                'area' => $validatedData['area'],
                'bedroom' => $validatedData['bedroom'],
                'bathroom' => $validatedData['bathroom'],
                'status' => $validatedData['status'],
            ]);
            
            if (isset($validatedData['benefits'])) {
                $property->benefits()->sync($validatedData['benefits']);
            }
            
               if ($request->hasFile('images')) {
                foreach ($validatedData['images'] as $key => $image) {
                    $imageName = time() . ' ' . $image->getClientOriginalName();
                    $imagePath = 'assets/images/properties/' . $property->id;
                    $image->move(public_path('assets/images/properties/' . $property->id), $imageName);
                    $image = $imagePath . '/' . $imageName;
                    $property->propertyImages()->create([
                        'image_path' => $image, 
                        'is_main' => $key == 0 ? true : false
                    ]);
                }
            }
   
            DB::commit();
            
            $this->handleAddress($property, $request);
            
            return redirect()->route('admin.properties.index')->with('success', 'Property created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to create property: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create property: ' . $e->getMessage());
        }
    }
    private function handleAddress($property, $request)
    {
        $lat = $request->input('latitude');
        $lng = $request->input('longitude');

        if (!$lat || !$lng) {
            return redirect()->back()->with('error', 'Latitude and longitude are required.');
        }

        // URL for the OpenStreetMap Nominatim API
        $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat={$lat}&lon={$lng}&addressdetails=1";

        // Make the request
        $client = new Client([
            'verify' => false,
            'headers' => [
                'User-Agent' => 'KHMASAT/1.0 (https://KHMASAT.com)'
            ]
        ]);
        $response = $client->get($url);
        $data = json_decode($response->getBody()->getContents());

        if (isset($data->address)) {
            $country = $data->address->country ?? null;
            $governorate = $data->address->state ?? null;
            $street = $data->address->road ?? null;
            $city = $data->address->city ?? $data->address->town ?? $data->address->village ?? null;

            $property->address()->create([
                'country' => $country,
                'governorate' => $governorate,
                'city' => $city,
                'street' => $street
            ]);
        }
    }
    public function show(Property $property)
    {
        $property = Property::query()
         ->with('propertyType','category','benefits','propertyImages','address')
        ->find($property->id);
        return view('front.property-detiles', compact('property'));
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