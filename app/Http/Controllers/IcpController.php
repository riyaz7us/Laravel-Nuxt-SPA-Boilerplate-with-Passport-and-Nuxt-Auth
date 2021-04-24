<?php

namespace App\Http\Controllers;

use App\Models\Icp;
use Illuminate\Http\Request;

class IcpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Icp  $icp
     * @return \Illuminate\Http\Response
     */
    public function show(Icp $icp)
    {
        $icp = Icp::find(1);
        return response()->json($icp,200);
    }

    public function showTestimonials(Icp $icp)
    {
        $icp = Icp::find(1);
        $testimonials=$icp->testimonials;
        return response()->json($testimonials,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Icp  $icp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();
        $program = Icp::updateOrCreate(
            ['id' => 1],
            $input
        );
        return response()->json($program, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Icp  $icp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Icp $icp)
    {
        //
    }
}
