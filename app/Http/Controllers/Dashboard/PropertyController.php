<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PropertyRepositoryInterface;
use App\Http\Requests\Property\StorePropertyRequest;
use GuzzleHttp\Client;


class PropertyController extends Controller
{
    protected $propertyRepository;
    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }
    public function index()
    {
        return $this->propertyRepository->index();
    }
    public function createProperty()
    {

        return $this->propertyRepository->createProperty();
    }
    public function storeProperty(Request $request)
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

        return $this->propertyRepository->storeProperty($request);
    }
}
