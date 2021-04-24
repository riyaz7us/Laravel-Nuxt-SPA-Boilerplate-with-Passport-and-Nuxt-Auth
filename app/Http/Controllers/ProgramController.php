<?php

namespace App\Http\Controllers;

use App\Models\LiveSession;
use App\Models\Program;
use Illuminate\Http\Request;
use Psr\Http\Message\ResponseInterface;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = Program::get();

        return response()->json($program, 200);
    }

    public function show($id)
    {
        $program = Program::find($id);

        return response()->json($program, 200);
    }

    public function getLiveSession($id)
    {
        $program = Program::with('LiveSession')->find($id);

        return response()->json($program, 200);
    }

    public function getIndustrialVisit($id)
    {
        $program = Program::with('IndustrialVisit')->find($id);

        return response()->json($program, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $program = Program::create($input);
        return response()->json($program,201);
    }

    public function createLiveSession(Request $request)
    {
        $input = $request->all();
        $program = LiveSession::updateOrCreate(
            ['program_id'=>$request->program_id],
            $input
        );
        return response()->json($program, 201);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $program)
    {
        $input = $request->all();
        $program = Program::find($program);
        $program = $program->update($input);
        return response()->json($program, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        //
    }
}
