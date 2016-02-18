<?php

namespace App\Services;

use App\Place;
use JWTAuth;

class PlaceService
{
    public function createOrUpdatePlace($request)
    {
        $place = Place::firstOrNew([
            'id' => $request->id,
        ]);

        $place->user_id = JWTAuth::toUser()->id;
        $place->lat = $request->lat;
        $place->lng = $request->lng;

        $place->save();
    }
}
