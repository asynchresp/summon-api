<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSummonRequest;
use App\Http\Requests\EditSummonRequest;
use App\Services\SummonService;
use App\Summon;
use Illuminate\Http\Request;

class SummonController extends Controller
{

    public function __construct(SummonService $SummonService)
    {
        $this->SummonService = $SummonService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $summons = Summon::all()->load('user');

        return response()->json($summons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddSummonRequest $request)
    {
        $this->SummonService->addOrEditSummon($request);

        return response()->json(['message' => 'Summon Saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Summon $summon)
    {
        return response()->json($summon->load('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSummonRequest $request, Summon $summon)
    {
        $this->SummonService->addOrEditSummon($request);

        return response()->json(['message' => 'Summon updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Summon $summon)
    {
        $summon->delete();

        return response()->json(['message' => 'Summon Deleted']);
    }
}
