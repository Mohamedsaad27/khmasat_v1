<?php

namespace App\Repository\Web;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteRepository
{
    public function getFavorites(Request $request){
        $user_id = auth()->user()->id;
        $favorites = Favorite::where('user_id', $user_id)->get();
        if ($favorites->isEmpty()) {
            return response()->json(['message' => 'No favorites found'], 404);
        }
        return response()->json(['favorites' => $favorites], 200);
    }

    public function addPropertyToFavorite(Request $request){
        $user_id = auth()->user()->id;
        $existingFavorite = Favorite::where('user_id', $user_id)
            ->where('property', $request->property_id)
            ->first();
        if ($existingFavorite) {
            return response()->json(['message' => 'Property is already in favorites'], 409);
        }
        try {
            $favorite = Favorite::create([
                'user_id' => $user_id,
                'property' => $request->property_id
            ]);
            return response()->json(['favorite' => $favorite], 201);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function removePropertyFromFavorite(Request $request){
        $user_id = auth()->user()->id;
        try {
            $favorite = Favorite::where('user_id', $user_id)
                ->where('property', $request->property_id)
                ->first();

            if ($favorite) {
                $favorite->delete();
                return response()->json(['message' => 'Property removed from favorites']);
            } else {
                return response()->json(['message' => 'Property not found in favorites'], 404);
            }
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

}
