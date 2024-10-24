<?php

namespace App\Repository\Api;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Response;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function index()
    {
        try {
            $categories = Category::all();
            return Response::json($categories, 200);
        } catch (Exception $e) {
            return Response::json(['message' => 'An error occurred: ' . $e->getMessage()], 404);
        }
    }

}