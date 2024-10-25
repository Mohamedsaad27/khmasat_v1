<?php

namespace App\Repository\Web;

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
        $properties = Property::query()->with('propertyType', 'category', 'benefits', 'propertyImages', 'address')->paginate(10);
        return view('admin.property.index', compact('properties'));
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
            if ($validatedData['price_after_discount'] > $validatedData['price']) {
                return redirect()->back()->with('error', 'يجب أن يكون السعر بعد الخصم أقل من السعر');
            }
            if ($validatedData['installment_amount'] > $validatedData['price']) {
                return redirect()->back()->with('error', 'يجب أن يكون مبلغ التقسيط أقل من السعر');
            }
            $property = Property::create([
                'user_id' => Auth::user()->id,
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
                'feature' => $validatedData['feature'] ?? 0,
                'price_after_discount' => $validatedData['price_after_discount'] ?? null,
            ]);

            if (isset($validatedData['benefits'])) {
                $property->benefits()->sync($validatedData['benefits']);
            }

            if ($request->hasFile('images')) {
                foreach ($validatedData['images'] as $key => $image) {
                    $imageName = time() . ' ' . $image->getClientOriginalName();
                    $imagePath = 'assets/imgs/properties/' . $property->id;
                    $image->move(public_path('assets/imgs/properties/' . $property->id), $imageName);
                    $image = $imagePath . '/' . $imageName;
                    $property->propertyImages()->create([
                        'image_path' => $image,
                        'is_main' => $key == 0 ? true : false
                    ]);
                }
            }

            $this->handleAddress($property, $request);

            DB::commit();

            return redirect()->route('properties.index')->with('successCreate', 'تم انشاء العقار بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to create property: ' . $e->getMessage());
            return redirect()->back()->with('errorCreate', 'Failed to create property: ' . $e->getMessage());
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
            $lat = $data->lat ?? null;
            $lng = $data->lon ?? null;

            $property->address()->create([
                'country' => $country,
                'governorate' => $governorate,
                'city' => $city,
                'street' => $street,
                'latitude' => $lat,
                'longitude' => $lng
            ]);
        }
    }
    public function show(Property $property)
    {
        $property = Property::query()
            ->with('propertyType', 'category', 'benefits', 'propertyImages', 'address')
            ->find($property->id);
        return view('front.property-detiles', compact('property'));
    }
    public function showPropertyInDashboard(Property $property)
    {
        $property = Property::query()
            ->with('propertyType', 'category', 'benefits', 'propertyImages', 'address')
            ->find($property->id);
        return view('admin.property.show', compact('property'));
    }
    public function edit(Property $property)
    {
        $benefits = DB::table('benefits')->get();
        $propertyTypes = DB::table('property_types')->get();

        return view('admin.property.edit', compact('property', 'benefits', 'propertyTypes'));
    }
    public function update(UpdatePropertyRequest $request, string $slug)
    {
        $validatedData = $request->validated();
//        dd($validatedData);
        try {
            DB::beginTransaction();
            $property = Property::find($slug);
            $property->update([
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title']),
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'installment_amount' => $validatedData['installment_amount'] ?? null,
                'area' => $validatedData['area'],
                'bedroom' => $validatedData['bedroom'],
                'bathroom' => $validatedData['bathroom'],
                'status' => $validatedData['status'],
                'feature' => $validatedData['feature'] ?? 0,
                'price_after_discount' => $validatedData['price_after_discount'] ?? null,
            ]);

            if (isset($validatedData['benefits'])) {
                $property->benefits()->sync($validatedData['benefits']);
            }

            if ($request->hasFile('images')) {
                foreach ($validatedData['images'] as $key => $image) {
                    $imageName = time() . ' ' . $image->getClientOriginalName();
                    $imagePath = 'assets/imgs/properties/' . $property->id;
                    $image->move(public_path('assets/imgs/properties/' . $property->id), $imageName);
                    $image = $imagePath . '/' . $imageName;
                    $property->propertyImages()->create([
                        'image_path' => $image,
                        'is_main' => $key == 0 ? true : false
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('properties.index')->with('successUpdate', 'تم تحديث العقار بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to update property: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update property: ' . $e->getMessage());
        }
    }
    public function destroy(Property $property)
    {

    }

}
