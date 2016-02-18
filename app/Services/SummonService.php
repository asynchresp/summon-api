<?php

namespace App\Services;

use App\Summon;
use JWTAuth;

class SummonService
{
    public function addOrEditSummon($request)
    {
        $summon = Summon::firstOrNew([
            'id' => $request->id,
        ]);

        $summon->user_id = JWTAuth::toUser()->id;
        $summon->amount = $request->amount;
        $summon->location = $request->location;
        $summon->due_date = $request->due_date;

        $summon->save();
    }
}
