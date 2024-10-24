<?php

namespace App\Repository\Api;

use App\Interfaces\TypePropertiesRepositoryInterface;
use App\Models\PropertyType;
use Exception;
use Illuminate\Support\Facades\Response;

class TypePropertiesRepository implements TypePropertiesRepositoryInterface
{

    public function index()
    {
        try {
            $propertyType = PropertyType::all();
            return Response::json($propertyType, 200);
        } catch (Exception $e) {
            return Response::json(['message' => 'An error occurred: ' . $e->getMessage()], 404);
        }
    }
}