<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface FavoriteRepositoryInterface
{
    public function getFavorites(Request $request);
    public function addPropertyToFavorite(Request $request);
    public function removePropertyFromFavorite(Request $request);
}
