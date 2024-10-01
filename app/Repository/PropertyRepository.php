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
use GuzzleHttp\Client;

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
        // dd($validatedData);
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
                'price_after_discount' => $validatedData['price_after_discount'] ?? null,
                'installment_amount' => $validatedData['installment_amount'] ?? null,
                'bedroom' => $validatedData['bedroom'],
                'bathroom' => $validatedData['bathroom'],
                'area' => $validatedData['area'],
                'status' => $validatedData['status'],
                'furnished' => $validatedData['furnished'] ?? false,
                'feature' => $validatedData['feature'] === 'on' ? true : false, 
            ]);
            $this->handleAddress($property, $request);
            $property->benefits()->sync($validatedData['benefits']);
            foreach ($validatedData['images'] as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('assets/images/properties/' . $property->id), $imageName);
                $property->propertyImages()->create([
                    'image_path' => $imageName, 
                ]);
            }
            DB::commit();
            return redirect()->route('admin.properties.index')->with('success', 'Property created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create property');
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