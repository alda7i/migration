<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
Route::post('/projects', function (Request $request) {

    $id = DB::table('projects')->insertGetId([
        'name' => $request->name,
        'description' => $request->description,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'status' => $request->status,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return response()->json([
        'message' => 'Project created successfully',
        'id' => $id
    ]);
});




