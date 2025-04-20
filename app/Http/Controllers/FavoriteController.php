<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggleFavorite($programId)
{
    $user = auth()->user();

    $isFavorited = $user->favoritePrograms()->where('programs_id', $programId)->exists();

    if ($isFavorited) {
        $user->favoritePrograms()->detach($programId);
    } else {
        $user->favoritePrograms()->attach($programId);
    }

    return back(); // or return a JSON response if using AJAX
}

}
