<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $webCategoryRepository;
    protected $apiCategoryRepository;
    public function __construct()
    {
        $this->webCategoryRepository = app('WebCategoryRepository');
        $this->apiCategoryRepository = app('ApiCategoryRepository');

    }

    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        return $this->apiCategoryRepository->index();
    }
    public function indexWeb()
    {
        return $this->webCategoryRepository->index();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->webCategoryRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->webCategoryRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->webCategoryRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return $this->webCategoryRepository->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->webCategoryRepository->destroy($id);
    }
}
