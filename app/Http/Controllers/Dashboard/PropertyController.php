<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PropertyRepositoryInterface;
use App\Http\Requests\Property\StorePropertyRequest;

class PropertyController extends Controller
{
    protected $propertyRepository;
    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }
    public function index(){
        return $this->propertyRepository->index();
    }
    public function createProperty(){
        
        return $this->propertyRepository->createProperty();
    }
    public function storeProperty(StorePropertyRequest $request){
        return $this->propertyRepository->storeProperty($request);
    }
}
