<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\PropertyRepositoryInterface;
use App\Models\Property;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    protected $propertyRepository;
    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->propertyRepository->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->propertyRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lat = $request->input('latitude');
        $lng = $request->input('longitude');

        if (!$lat || !$lng) {
            dd(['error' => 'Latitude and longitude are required.']);
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

            dd([
                'country' => $country,
                'governorate' => $governorate,
                'city' => $city,
                'street' => $street
            ]);
        }

        return $this->propertyRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return $this->propertyRepository->edit($property);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
